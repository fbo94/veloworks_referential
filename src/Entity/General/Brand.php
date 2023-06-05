<?php

namespace App\Entity\General;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Entity\Component\Component;
use App\Entity\Bike\Bicycle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity]
#[ORM\Table(name: "brand")]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private string $id;

    #[ORM\Column(type: "string",length: 100)]
    private string $label;

    #[ORM\Column(type: "string",length: 20)]
    private string $code;

    #[ORM\Column(type: "integer")]
    private int $createdYear;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    private Country $country;

    #[ORM\OneToMany(mappedBy: "brand", targetEntity: Bicycle::class)]
    private Collection $bikes;

    #[ORM\OneToMany(mappedBy: "brand", targetEntity: Component::class)]
    private Collection $components;

    public function __construct()
    {
        $this->bikes = new ArrayCollection();
        $this->components = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getCreatedYear(): int
    {
        return $this->createdYear;
    }

    /**
     * @param int $createdYear
     */
    public function setCreatedYear(int $createdYear): void
    {
        $this->createdYear = $createdYear;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    /**
     * @return Collection
     */
    public function getBikes(): Collection
    {
        return $this->bikes;
    }

    /**
     * @param Collection $bikes
     */
    public function setBikes(Collection $bikes): void
    {
        $this->bikes = $bikes;
    }

    /**
     * @return Collection
     */
    public function getComponents(): Collection
    {
        return $this->components;
    }

    /**
     * @param Collection $components
     */
    public function setComponents(Collection $components): void
    {
        $this->components = $components;
    }
}