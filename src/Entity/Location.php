<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=Rental::class, mappedBy="pickUpLocationId")
     */
    private $pickUpRentals;
    
    /**
     * @ORM\OneToMany(targetEntity=Rental::class, mappedBy="dropOffLocationId")
     */
    private $dropOffRentals;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="pickUpLocationId")
     */
    private $pickUpReservations;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="dropOffLocationId")
     */
    private $dropOffReservations;



    public function __construct()
    {
        $this->pickUpRentals = new ArrayCollection();
        $this->dropOffRentals = new ArrayCollection();
        $this->pickUpReservations = new ArrayCollection();
        $this->dropOffReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Rental[]
     */
    public function getPickUpRentals(): Collection
    {
        return $this->pickUpRentals;
    }

    public function addPickUpRental(Rental $pickUpRental): self
    {
        if (!$this->pickUpRentals->contains($pickUpRental)) {
            $this->pickUpRentals[] = $pickUpRental;
            $pickUpRental->setPickUpLocationId($this);
        }

        return $this;
    }

    public function removePickUpRental(Rental $pickUpRental): self
    {
        if ($this->pickUpRentals->removeElement($pickUpRental)) {
            // set the owning side to null (unless already changed)
            if ($pickUpRental->getPickUpLocationId() === $this) {
                $pickUpRental->setPickUpLocationId(null);
            }
        }
        return $this;
    }
    
    /**
     * @return Collection|Rental[]
     */
    public function getDropOffRentals(): Collection
    {
        return $this->dropOffRentals;
    }

    public function addDropOffRental(Rental $dropOffRental): self
    {
        if (!$this->dropOffRentals->contains($dropOffRental)) {
            $this->dropOffRentals[] = $dropOffRental;
            $dropOffRental->setDropOffLocationId($this);
        }

        return $this;
    }

    public function removeDropOffRental(Rental $dropOffRental): self
    {
        if ($this->dropOffRentals->removeElement($dropOffRental)) {
            // set the owning side to null (unless already changed)
            if ($dropOffRental->getDropOffLocationId() === $this) {
                $dropOffRental->setDropOffLocationId(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getPickUpReservations(): Collection
    {
        return $this->pickUpReservations;
    }

    public function addPickUpReservation(Reservation $pickUpReservation): self
    {
        if (!$this->pickUpReservations->contains($pickUpReservation)) {
            $this->pickUpReservations[] = $pickUpReservation;
            $pickUpReservation->setPickUpLocationId($this);
        }

        return $this;
    }

    public function removePickUpReservation(Reservation $pickUpReservation): self
    {
        if ($this->pickUpReservations->removeElement($pickUpReservation)) {
            // set the owning side to null (unless already changed)
            if ($pickUpReservation->getPickUpLocationId() === $this) {
                $pickUpReservation->setPickUpLocationId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getDropOffReservations(): Collection
    {
        return $this->dropOffReservations;
    }

    public function addDropOffReservations(Reservation $dropOffReservation): self
    {
        if (!$this->dropOffReservations->contains($dropOffReservation)) {
            $this->dropOffReservations[] = $dropOffReservation;
            $dropOffReservation->setDropOffLocationId($this);
        }

        return $this;
    }

    public function removeDropOffReservation(Reservation $dropOffReservation): self
    {
        if ($this->dropOffReservations->removeElement($dropOffReservation)) {
            // set the owning side to null (unless already changed)
            if ($dropOffReservation->getDropOffLocationId() === $this) {
                $dropOffReservation->setDropOffLocationId(null);
            }
        }

        return $this;
    }
}
