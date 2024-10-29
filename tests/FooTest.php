<?php

class FooTest extends AbstractTest
{
    use \Zenstruck\Foundry\Test\Factories;

    public function testProxyObjectCreatingEntities(): void
    {
        $foo = \App\Factory\FooFactory::createOne();
        //$foo->_real()->createABarAndAddToFoo(); //This works
        $foo->createABarAndAddToFoo(); //This errors with:
        /**
         * 1) FooTest::testProxyObjectCreatingEntities
         * Doctrine\ORM\ORMInvalidArgumentException: A new entity was found through the relationship 'App\Entity\FooBar#foo' that was not configured to cascade persist operations for entity: AppEntityFooProxy@371. To solve this issue: Either explicitly call EntityManager#persist() on this unknown entity or configure cascade persist this association in the mapping for example @ManyToOne(..,cascade={"persist"}). If you cannot find out which entity causes the problem implement 'App\Entity\Foo#__toString()' to get a clue.
         *
         * /app/vendor/doctrine/orm/src/ORMInvalidArgumentException.php:68
         * /app/vendor/doctrine/orm/src/UnitOfWork.php:3166
         * /app/vendor/doctrine/orm/src/UnitOfWork.php:368
         * /app/vendor/doctrine/orm/src/EntityManager.php:264
         * /app/vendor/zenstruck/foundry/src/Persistence/PersistenceManager.php:101
         * /app/vendor/zenstruck/foundry/src/Persistence/PersistenceManager.php:73
         * /app/vendor/zenstruck/foundry/src/Persistence/IsProxy.php:60
         * /app/tests/FooTest.php:11
         * /app/vendor/phpunit/phpunit/phpunit:107
         */
        $foo->_save();
    }

    //public function testModifyingProxyOnArray()
    //{
    //    $fixtures = $this->makeFixture();
    //    $fixtures['bar']->setBaz('a');
    //    $fixtures['bar']->setBazArr(['a']);
    //    $fixtures['bar']->_save();
    //    $fixtures['bar']->_refresh();
    //
    //    self::assertEquals('a', $fixtures['bar']->getBaz());
    //}


}
