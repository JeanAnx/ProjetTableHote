<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\BookingsFormType;
use App\Form\NewPassType;
use App\Form\UserType;
use App\Repository\BookingsRepository;
use App\Repository\HostTablesRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    private $encrypt;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encrypt = $encoder;
    }

    /**
     * @Route("/admin/user", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newAccount", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/{id}", name="user_show", methods={"GET","POST"})
     * @param User $user
     * @param BookingsRepository $bookingsRepository
     * @param HostTablesRepository $hostTablesRepository
     * @return Response
     */
    public function show(User $user, BookingsRepository $bookingsRepository, HostTablesRepository $hostTablesRepository, Request $request): Response
    {
        $tables = $hostTablesRepository->findBy([
            "creator" => $user
        ]);

        $resa = $bookingsRepository->findBy([
            "client" => $user
        ]);

        $passForm = $this->createForm(NewPassType::class);
        $passForm->handleRequest($request);

        if ($passForm->isSubmitted() && $passForm->isValid()) {
            $newPass = $passForm->getData();
            $user->setPassword($this->encrypt->encodePassword($user,$newPass["password"]));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_show' , [
                'id' => $user->getId()
            ]);

        }

        return $this->render('user/show.html.twig', [
            'user' => $user,
            'hostTables' => $tables,
            'bookings' => $resa,
            'passForm' => $passForm->createView()
        ]);
    }

    /**
     * @Route("/admin/user/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index', [
                'id' => $user->getId(),
            ]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/{id}", name="user_delete", methods={"DELETE"})
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function delete(Request $request, User $user, HostTablesRepository $hostTablesRepository, BookingsRepository $bookingsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $reservations = $bookingsRepository->findBy([
                "client" => $user
            ]);
            $tables = $hostTablesRepository->findBy([
                "creator" => $user
            ]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservations);
            $entityManager->remove($tables);
            $this->get('security.token_storage')->setToken(null);
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('host_tables_index');
    }
}
