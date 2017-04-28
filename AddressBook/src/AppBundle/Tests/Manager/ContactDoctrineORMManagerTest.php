<?php

namespace AppBundle\Tests\Manager;


use AppBundle\Entity\Contact;
use AppBundle\Manager\ContactDoctrineORMManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactDoctrineORMManagerTest extends KernelTestCase
{
    /**
     * @var ContactDoctrineORMManager
     */
    protected $manager;

    public function setUp()
    {
        // Le code ci-dessous récupère l'EntityManager
        // en passant pas la config de Symfony
        // (self::bootKernel() démarre l'appli Symfony)
        // C'est long, le test n'est pas unitaire
        // et dépend de la base donc il faudrait dans le setup
        // la réinitialiser avec DoctrineDataFixture
        /*
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $em = $container->get('doctrine.orm.entity_manager');
        */
        $this->emMock = $this->getMockBuilder(EntityManager::class)
                        ->disableOriginalConstructor()
                        ->getMock();
        $this->manager = new ContactDoctrineORMManager($this->emMock);

    }

    /*
    public function testGetAll()
    {
        $contacts = $this->manager->getAll();
        $this->assertCount(7, $contacts);
        $this->assertInstanceOf(Contact::class, $contacts[0]);
    }
    */

    public function testSave()
    {
        /*
        $this->emMock->expects($this->once())
                ->method('persist');

        $this->emMock->expects($this->once())
            ->method('flush');
        */

        $contact = new Contact();
        $this->manager->save($contact);
    }
}