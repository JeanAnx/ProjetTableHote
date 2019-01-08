<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HoursRepository")
 */
class Hours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $day;

    /**
     * @ORM\Column(type="time")
     */
    private $morningStart;

    /**
     * @ORM\Column(type="time")
     */
    private $morningEnd;

    /**
     * @ORM\Column(type="time")
     */
    private $eveningStart;

    /**
     * @ORM\Column(type="time")
     */
    private $eveningEnd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HostTables", inversedBy="hours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hostTable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getMorningStart(): ?\DateTimeInterface
    {
        return $this->morningStart;
    }

    public function setMorningStart(\DateTimeInterface $morningStart): self
    {
        $this->morningStart = $morningStart;

        return $this;
    }

    public function getMorningEnd(): ?\DateTimeInterface
    {
        return $this->morningEnd;
    }

    public function setMorningEnd(\DateTimeInterface $morningEnd): self
    {
        $this->morningEnd = $morningEnd;

        return $this;
    }

    public function getEveningStart(): ?\DateTimeInterface
    {
        return $this->eveningStart;
    }

    public function setEveningStart(\DateTimeInterface $eveningStart): self
    {
        $this->eveningStart = $eveningStart;

        return $this;
    }

    public function getEveningEnd(): ?\DateTimeInterface
    {
        return $this->eveningEnd;
    }

    public function setEveningEnd(\DateTimeInterface $eveningEnd): self
    {
        $this->eveningEnd = $eveningEnd;

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
}
