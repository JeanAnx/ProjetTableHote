<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bookings", mappedBy="client")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bookings", mappedBy="creator", orphanRemoval=true)
     */
    private $booking;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HostTables", mappedBy="creator", orphanRemoval=true)
     */
    private $hostTables;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->booking = new ArrayCollection();
        $this->hostTables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Bookings[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Bookings $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setClient($this);
        }

        return $this;
    }

    public function removeBooking(Bookings $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getClient() === $this) {
                $booking->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bookings[]
     */
    public function getBooking(): Collection
    {
        return $this->booking;
    }

    /**
     * @return Collection|HostTables[]
     */
    public function getHostTables(): Collection
    {
        return $this->hostTables;
    }

    public function addHostTable(HostTables $hostTable): self
    {
        if (!$this->hostTables->contains($hostTable)) {
            $this->hostTables[] = $hostTable;
            $hostTable->setCreator($this);
        }

        return $this;
    }

    public function removeHostTable(HostTables $hostTable): self
    {
        if ($this->hostTables->contains($hostTable)) {
            $this->hostTables->removeElement($hostTable);
            // set the owning side to null (unless already changed)
            if ($hostTable->getCreator() === $this) {
                $hostTable->setCreator(null);
            }
        }

        return $this;
    }
}
