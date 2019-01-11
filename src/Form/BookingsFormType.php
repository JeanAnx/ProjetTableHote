<?php

namespace App\Form;

use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingsFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $today = new DateTime('now');
        $builder
            ->add('date', DateType::class, array(
                'label' => 'Date',
                'required' => true,
                'attr' => ['id' => 'date',
                    'min' => $today->format('Y-m-d'),
                    'onchange' => 'alimenterSelect()'],
                'widget' => 'single_text'
            ))


            ->add('heure', ChoiceType::class, array(
                'label' => 'Heure',
                'required' => true,
                'attr' => ['id' => 'heure']
            ))
        ->add('nb_convives', ChoiceType::class, array(
            'label' => 'Nombres de convives',
            'required' => true,
            'attr' => ['id' => 'nb_convives',
                'onchange' => 'calculTotal()'],
            'choices' => array(
                '1 convive' => '1',
                '2 convives' => '2',
                '3 convives' => '3',
                '4 convives' => '4',
                '5 convives' => '5',
                '6 convives' => '6',
            )
        ))
        ->add('reserver', SubmitType::class, array(
            'label' => 'Réserver',
            'attr' => ['id' => 'reserver'],
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'nb_convives' => '1 convive'
        ]);
    }
}
