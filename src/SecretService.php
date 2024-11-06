<?php

namespace App;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class SecretService
{
    public function __construct(
        #[Autowire(env: 'MY_SECRET')] private readonly string $mySecret
    )
    {

    }

    public function printMySecret(): void
    {
        var_dump($this->mySecret);
    }
}
