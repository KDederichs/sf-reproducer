<?php

namespace App\Entity\Embeds;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;

#[Embeddable]
class BazEmbed
{
    #[Column(type: 'bigint', nullable: false, options: ['default' => "0"])]
    private ?string $bazz = '0';

    public function getBazz(): ?string
    {
        return $this->bazz;
    }

    public function setBazz(?string $bazz): void
    {
        $this->bazz = $bazz;
    }
}
