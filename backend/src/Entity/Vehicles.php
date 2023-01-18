<?php

namespace App\Entity;

use App\Repository\VehiclesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiclesRepository::class)]
class Vehicles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $brand = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $year = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $energy = null;

    #[ORM\Column(nullable: true)]
    private ?int $power = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(nullable: true)]
    private ?int $price_retail = null;

    #[ORM\Column(nullable: true)]
    private ?int $price_monthly = null;
    #[ORM\Column(nullable: true)]
    private ?int $mileage = null;
    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $pics = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getEnergy(): ?string
    {
        return $this->energy;
    }

    public function setEnergy(?string $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(?int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceRetail(): ?int
    {
        return $this->price_retail;
    }

    public function setPriceRetail(?int $price_retail): self
    {
        $this->price_retail = $price_retail;

        return $this;
    }

    public function getPriceMonthly(): ?int
    {
        return $this->price_monthly;
    }

    public function setPriceMonthly(?int $price_monthly): self
    {
        $this->price_monthly = $price_monthly;

        return $this;
    }
    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }
    public function getPics(): array
    {
        return $this->pics;
    }

    public function setPics(?array $pics): self
    {
        $this->pics = $pics;

        return $this;
    }
}
