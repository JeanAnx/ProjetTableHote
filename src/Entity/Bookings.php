<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingsRepository")
 */
class Bookings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $seats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $health = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HostTables", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hostTable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bookings")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="booking")
     * @ORM\JoinColumn(nullable=false)
     */
    private $creator;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHealth(): ?array
    {
        return $this->health;
    }

    public function setHealth(?array $health): self
    {
        $this->health = $health;

        return $this;
    }

    public function getHostTable(): ?HostTables
    {
        return $this->hostTable;
    }

    public function setHostTable(?HostTables $hostTable): self
    {
        $this->hostTable = $hostTable;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }


}
