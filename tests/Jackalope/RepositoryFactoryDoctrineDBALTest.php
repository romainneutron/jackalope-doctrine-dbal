<?php

namespace Jackalope;

class RepositoryFactoryDoctrineDBALTest extends \PHPUnit_Framework_TestCase
{
    public function testMissingRequired()
    {
        $factory = new RepositoryFactoryDoctrineDBAL();
        $this->assertNull($factory->getRepository(array()));
    }

    public function testExtraParameter()
    {
        $factory = new RepositoryFactoryDoctrineDBAL();
        $conn = $this->getMockBuilder('Doctrine\DBAL\Connection')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->assertNull($factory->getRepository(array(
            'jackalope.doctrine_dbal_connection' => $conn,
            'unknown' => 'garbage',
        )));
    }
}
