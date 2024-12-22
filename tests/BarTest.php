<?php

namespace App\Tests;

use App\Entity\Bar;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BarTest extends KernelTestCase
{
    public function testGetBar(): void
    {
        $bar = new Bar();
        /** @var EntityManagerInterface $em */
        $em = self::getContainer()->get(EntityManagerInterface::class);
        $em->persist($bar);
        $em->flush();
        $em->clear();
        $bar2 = $em->getRepository(Bar::class)->find($bar->getId());
        // cannot use UOW::recomputeSingleEntityChangeSet() here as it wrongly computes embedded objects as changed
        $em->getUnitOfWork()->computeChangeSet($em->getClassMetadata(Bar::class), $bar2);
        var_dump($em->getUnitOfWork()->getEntityChangeSet($bar2));
        self::assertEmpty($em->getUnitOfWork()->getEntityChangeSet($bar2));
    }
}
