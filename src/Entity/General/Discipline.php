<?php

namespace App\Entity\General;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Entity\Bike\Type;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity]
#[ORM\Table(name: "discipline")]
class Discipline
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string",length: 100)]
    #[Assert\NotBlank]
    private string $label;
    #[ORM\Column(type: "string",length: 10)]
    #[Assert\NotBlank]
    private string $code;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\OneToMany(mappedBy: "discipline", targetEntity: Type::class)]
    private Collection $bikeTypes;

    public function __construct()
    {
        $this->bikeTypes = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getBikeTypes(): Collection
    {
        return $this->bikeTypes;
    }

    public function setBikeTypes(Collection $bikeTypes): void
    {
        $this->bikeTypes = $bikeTypes;
    }
}