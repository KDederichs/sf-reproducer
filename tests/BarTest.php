<?php

namespace App\Tests;

use App\Factory\BarFactory;
use App\Factory\FooFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class BarTest extends KernelTestCase
{
    use HasBrowser;
    use Factories;
    use ResetDatabase;

    public function testGetBar(): void
    {
        $bar = BarFactory::createOne();
        self::assertEquals($bar->getId(), $bar->getId());
    }
}
