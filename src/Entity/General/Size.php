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
#[ORM\Entity()]
#[ORM\Table(name: "size")]

class Size
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $code;

    #[ORM\Column(type: "string", length: 100)]
    private string $label;

    #[ORM\Column(type: "integer")]
    private ?int $minSizeCm;

    #[ORM\Column(type: "integer")]
    private ?int $maxSizeCm;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getMinSizeCm(): ?int
    {
        return $this->minSizeCm;
    }

    public function setMinSizeCm(?int $minSizeCm): void
    {
        $this->minSizeCm = $minSizeCm;
    }

    public function getMaxSizeCm(): ?int
    {
        return $this->maxSizeCm;
    }

    public function setMaxSizeCm(?int $maxSizeCm): void
    {
        $this->maxSizeCm = $maxSizeCm;
    }
}