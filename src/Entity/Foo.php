<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[Entity]
class Foo
{
    #[Id, Column(type: UuidType::NAME)]
    private Uuid $id;
    #[OneToMany(mappedBy: 'foo', targetEntity: FooBar::class, cascade: ['persist', 'remove'], fetch: 'EAGER', orphanRemoval: true)]
    private Collection $fooBarCollection;

    public function __construct()
    {
        $this->id = Uuid::v7();
        $this->fooBarCollection = new ArrayCollection();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getFooBarCollection(): Collection
    {
        return $this->fooBarCollection;
    }

    public function setFooBarCollection(Collection $fooBarCollection): void
    {
        $this->fooBarCollection = $fooBarCollection;
    }

    public function addBarToFoo(Bar $bar): self
    {
        $fooBar = new FooBar();
        $fooBar
            ->setBar($bar)
            ->setFoo($this)
        ;

        $this->fooBarCollection->add($fooBar);

        return $this;
    }

    public function createABarAndAddToFoo(): self
    {
        $bar = new Bar();
        return $this->addBarToFoo($bar);
    }
}
