<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[Entity]
class FooBar
{
    #[Id, Column(type: UuidType::NAME)]
    private Uuid $id;
    #[ManyToOne(targetEntity: Foo::class, inversedBy: 'fooBarCollection')]
    private Foo $foo;
    #[ManyToOne(targetEntity: Bar::class, cascade: ['persist'], fetch: 'EAGER')]
    private Bar $bar;

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function setFoo(Foo $foo): self
    {
        $this->foo = $foo;

        return $this;
    }

    public function setBar(Bar $bar): self
    {
        $this->bar = $bar;

        return $this;
    }

    public function getFoo(): Foo
    {
        return $this->foo;
    }

    public function getBar(): Bar
    {
        return $this->bar;
    }


}
