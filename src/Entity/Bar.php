<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[Entity]
#[ApiResource]
#[Get]
#[GetCollection]
class Bar
{
    #[Id, Column(type: UuidType::NAME)]
    private Uuid $id;
    #[Column(type: 'bigint', nullable: false, options: ['default' => "0"])]
    private ?string $baz = '0';

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function getBaz(): ?string
    {
        return $this->baz;
    }

    public function setBaz(?string $baz): self
    {
        $this->baz = $baz;

        return $this;
    }
}
