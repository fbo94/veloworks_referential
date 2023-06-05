<?php

namespace App\Entity\Component;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Entity\General\Brand;
use App\Entity\General\Material;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity()]
#[ORM\Table(name: "component")]
class Component
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;


    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\ManyToOne(targetEntity: Type::class)]
    private Type $type;

    #[ORM\ManyToMany(targetEntity: Material::class)]
    #[ORM\JoinColumn(name: "material_id", referencedColumnName: "id")]
    private Collection $materials;

    #[ORM\ManyToOne(targetEntity: Brand::class)]
    private Brand $brand;

    #[ORM\Column(type: "float")]
    private ?float $indicativeWeight;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param Type $type
     */
    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection
     */
    public function getMaterials(): Collection
    {
        return $this->materials;
    }

    /**
     * @param Collection $materials
     */
    public function setMaterials(Collection $materials): void
    {
        $this->materials = $materials;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return float|null
     */
    public function getIndicativeWeight(): ?float
    {
        return $this->indicativeWeight;
    }

    /**
     * @param float|null $indicativeWeight
     */
    public function setIndicativeWeight(?float $indicativeWeight): void
    {
        $this->indicativeWeight = $indicativeWeight;
    }
}