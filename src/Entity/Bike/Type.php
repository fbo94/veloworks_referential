<?php

namespace App\Entity\Bike;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Entity\General\Discipline;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity]
#[ORM\Table(name: "bike_types")]
#[UniqueEntity('name')]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string",length: 100)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Discipline::class)]
    private Collection $disciplines;

    public function __construct()
    {
        $this->disciplines = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDisciplines(): Collection
    {
        return $this->disciplines;
    }

    /**
     * @param Collection $disciplines
     */
    public function setDisciplines(Collection $disciplines): void
    {
        $this->disciplines = $disciplines;
    }

}