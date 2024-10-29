<?php

use Zenstruck\Foundry\Test\Factories;

abstract class AbstractTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
    use Factories;

    protected function makeFixture(): array
    {
        $bar = \App\Factory\BarFactory::createOne();
        $foo = \App\Factory\FooFactory::createOne();
        return [
            'bar' => $bar,
            'foo' => $foo,
        ];
    }
}
