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

#[ApiResource(operations: [new Get(), new GetCollection(), new Post(), new Delete(), new Put(), new Patch(),])]
#[ORM\Entity]
#[ORM\Table(name: "color")]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private string $id;

    #[ORM\Column(type: "string",length: 100)]
    private string $label;

    #[ORM\Column(type: "string",length: 10)]
    private string $code;

    #[ORM\Column(type: "string",length: 100)]
    private ?string $dominante;

    #[ORM\Column(type: "string",length: 100)]
    private ?string $panetoneCode;

    public function getId(): string
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

    public function getDominante(): ?string
    {
        return $this->dominante;
    }

    public function setDominante(?string $dominante): void
    {
        $this->dominante = $dominante;
    }

    public function getPanetoneCode(): ?string
    {
        return $this->panetoneCode;
    }

    public function setPanetoneCode(?string $panetoneCode): void
    {
        $this->panetoneCode = $panetoneCode;
    }
}