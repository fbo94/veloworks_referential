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
     * @return int|null
     */
    public function getMinSizeCm(): ?int
    {
        return $this->minSizeCm;
    }

    /**
     * @param int|null $minSizeCm
     */
    public function setMinSizeCm(?int $minSizeCm): void
    {
        $this->minSizeCm = $minSizeCm;
    }

    /**
     * @return int|null
     */
    public function getMaxSizeCm(): ?int
    {
        return $this->maxSizeCm;
    }

    /**
     * @param int|null $maxSizeCm
     */
    public function setMaxSizeCm(?int $maxSizeCm): void
    {
        $this->maxSizeCm = $maxSizeCm;
    }
}