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
    #[Column(type: 'text', nullable: true)]
    private ?string $baz = null;
    #[Column(type: 'json', options: ['default' => '[]'])]
    private array $bazArr = [];

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

    public function getBazArr(): array
    {
        return $this->bazArr;
    }

    public function setBazArr(array $bazArr): self
    {
        $this->bazArr = $bazArr;
        return $this;
    }
}
