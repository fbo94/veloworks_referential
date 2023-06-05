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

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return string|null
     */
    public function getDominante(): ?string
    {
        return $this->dominante;
    }

    /**
     * @param string|null $dominante
     */
    public function setDominante(?string $dominante): void
    {
        $this->dominante = $dominante;
    }

    /**
     * @return string|null
     */
    public function getPanetoneCode(): ?string
    {
        return $this->panetoneCode;
    }

    /**
     * @param string|null $panetoneCode
     */
    public function setPanetoneCode(?string $panetoneCode): void
    {
        $this->panetoneCode = $panetoneCode;
    }
}