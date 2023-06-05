<?php

namespace App\Entity\Bike;

use ApiPlatform\{Metadata\ApiResource,
    Metadata\Delete,
    Metadata\Get,
    Metadata\GetCollection,
    Metadata\Patch,
    Metadata\Post,
    Metadata\Put};
use App\Entity\{Component\Component, General\Brand, General\Color, General\Material, General\Size};
use App\Repository\Bike\BicycleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity(repositoryClass: BicycleRepository::class)]
#[ORM\Table(name: "bicycle")]

class Bicycle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToMany(targetEntity: Brand::class)]
    private Brand $brand;

    #[ORM\Column(type: "string", length: 100)]
    private string $model;

    #[ORM\Column(type: "integer")]
    #[Assert\Date]
    private ?int $year;

    #[ORM\ManyToOne(targetEntity: Size::class)]
    private ?Size $size;

    #[ORM\ManyToMany(targetEntity: Color::class)]
    private Collection $colors;

    #[ORM\ManyToMany(targetEntity: Material::class)]
    private Collection $materials;

    #[ORM\ManyToMany(targetEntity: Component::class)]
    private Collection $components;

    #[ORM\ManyToOne(targetEntity: Type::class)]
    #[ORM\JoinColumn(name: "bike_type_id", referencedColumnName: "id")]
    private Type $bikeType;

    public function __construct()
    {
        $this->components = new ArrayCollection();
        $this->materials = new ArrayCollection();
        $this->colors = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }


    public function getModel(): string
    {
        return $this->model;
    }


    public function setModel(string $model): void
    {
        $this->model = $model;
    }


    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return Size|null
     */
    public function getSize(): ?Size
    {
        return $this->size;
    }

    /**
     * @param Size|null $size
     */
    public function setSize(?Size $size): void
    {
        $this->size = $size;
    }


    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function setColors(Collection $colors): void
    {
        $this->colors = $colors;
    }


    public function getMaterials(): ArrayCollection
    {
        return $this->materials;
    }

    public function setMaterials(ArrayCollection $materials): void
    {
        $this->materials = $materials;
    }

    public function getComponents(): ArrayCollection
    {
        return $this->components;
    }

    public function setComponents(ArrayCollection $components): void
    {
        $this->components = $components;
    }

    public function getBikeType(): Type
    {
        return $this->bikeType;
    }

    public function setBikeType(Type $bikeType): void
    {
        $this->bikeType = $bikeType;
    }
}