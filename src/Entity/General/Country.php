<?php

namespace App\Entity\General;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity]
#[ORM\Table(name: "country")]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string",length: 255, nullable: false)]
    #[Assert\Length(max: 255)]
    #[Assert\NotBlank]
    private string $label;

    #[ORM\Column(type: "string",length: 2, unique: true, nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 2)]
    private string $codeAlpha2;

    #[ORM\Column(type: "string",length: 3, unique: true, nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 3)]
    private string $codeAlpha3;

    #[ORM\Column(type: "string",length: 3, unique: true, nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 3)]
    private string $codeNumeric;

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

    public function getCodeAlpha2(): string
    {
        return $this->codeAlpha2;
    }

    /**
     * @param string $codeAlpha2
     */
    public function setCodeAlpha2(string $codeAlpha2): void
    {
        $this->codeAlpha2 = $codeAlpha2;
    }

    public function getCodeAlpha3(): string
    {
        return $this->codeAlpha3;
    }

    public function setCodeAlpha3(string $codeAlpha3): void
    {
        $this->codeAlpha3 = $codeAlpha3;
    }

    public function getCodeNumeric(): string
    {
        return $this->codeNumeric;
    }

    public function setCodeNumeric(string $codeNumeric): void
    {
        $this->codeNumeric = $codeNumeric;
    }
}
