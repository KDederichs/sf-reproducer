<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[Entity]
class Bar
{
    #[Id, Column(type: UuidType::NAME)]
    private Uuid $id;
    #[Column(type: 'bigint', nullable: false, options: ['default' => "0"])]
    private ?string $baz = '0';
    #[Column(type: 'string', nullable: false, options: ['default' => "0"])]
    private ?string $foo = '0';

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

    public function getFoo(): ?string
    {
        return $this->foo;
    }

    public function setFoo(?string $foo): void
    {
        $this->foo = $foo;
    }
}
