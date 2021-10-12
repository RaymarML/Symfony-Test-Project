<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="pickUpReservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pickUpLocationId;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="categoryId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dropOffLocationId;

    /**
     * @ORM\ManyToOne(targetEntity=CarCategory::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryId;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customerId;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategoryId(): ?CarCategory
    {
        return $this->categoryId;
    }

    public function setCategoryId(?CarCategory $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
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
}
