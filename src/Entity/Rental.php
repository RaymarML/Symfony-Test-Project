<?php

namespace App\Entity;

use App\Repository\RentalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RentalRepository::class)
 */
class Rental
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customerId;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carId;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pickUpLocationId;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dropOffLocationId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remarks;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?Customer
    {
        return $this->customerId;
    }

    public function setCustomerId(?Customer $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getCarId(): ?Car
    {
        return $this->carId;
    }

    public function setCarId(?Car $carId): self
    {
        $this->carId = $carId;

        return $this;
    }

    public function getPickUpLocationId(): ?Location
    {
        return $this->pickUpLocationId;
    }

    public function setPickUpLocationId(?Location $pickUpLocationId): self
    {
        $this->pickUpLocationId = $pickUpLocationId;

        return $this;
    }

    public function getDropOffLocationId(): ?Location
    {
        return $this->dropOffLocationId;
    }

    public function setDropOffLocationId(?Location $dropOffLocationId): self
    {
        $this->dropOffLocationId = $dropOffLocationId;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }
}
