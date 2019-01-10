<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HostTablesRepository")
 */
class HostTables
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $minPrice;

    /**
     * @ORM\Column(type="float")
     */
    private $maxPrice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacity;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @ORM\Column(type="text")
     */
    private $longDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $img = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $cookStyle = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bookings", mappedBy="table_id", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hours", mappedBy="TableId", orphanRemoval=true)
     */
    private $hours;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vege;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vegan;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gluten;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $creator;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->hours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMinPrice(): ?float
    {
        return $this->minPrice;
    }

    public function setMinPrice(float $minPrice): self
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    public function getMaxPrice(): ?float
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(float $maxPrice): self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getImg(): ?array
    {
        return $this->img;
    }

    public function setImg(?array $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCookStyle(): ?array
    {
        return $this->cookStyle;
    }

    public function setCookStyle(?array $cookStyle): self
    {
        $this->cookStyle = $cookStyle;

        return $this;
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
            $booking->setHostTable($this);
        }

        return $this;
    }

    public function removeBooking(Bookings $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getHostTable() === $this) {
                $booking->setHostTable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hours[]
     */
    public function getHours(): Collection
    {
        return $this->hours;
    }

    public function addHour(Hours $hour): self
    {
        if (!$this->hours->contains($hour)) {
            $this->hours[] = $hour;
            $hour->setHostTable($this);
        }

        return $this;
    }

    public function removeHour(Hours $hour): self
    {
        if ($this->hours->contains($hour)) {
            $this->hours->removeElement($hour);
            // set the owning side to null (unless already changed)
            if ($hour->getHostTable() === $this) {
                $hour->setHostTable(null);
            }
        }

        return $this;
    }

    public function getVege(): ?bool
    {
        return $this->vege;
    }

    public function setVege(bool $vege): self
    {
        $this->vege = $vege;

        return $this;
    }

    public function getVegan(): ?bool
    {
        return $this->vegan;
    }

    public function setVegan(?bool $vegan): self
    {
        $this->vegan = $vegan;

        return $this;
    }

    public function getGluten(): ?bool
    {
        return $this->gluten;
    }

    public function setGluten(?bool $gluten): self
    {
        $this->gluten = $gluten;

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
