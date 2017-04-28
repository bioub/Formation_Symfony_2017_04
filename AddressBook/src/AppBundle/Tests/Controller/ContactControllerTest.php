<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Manager\ContactArrayManager;
use AppBundle\Manager\ContactDoctrineORMManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertCount(8, $crawler->filter('table.table:first-of-type tr'));
        $this->assertEquals('Liste des contacts', $crawler->filter('title')->text());
    }

    public function testListAvecFake()
    {
        $client = static::createClient();

        $fake = new ContactArrayManager();
        $client->getContainer()->set('app.manager.contact_manager', $fake);

        $crawler = $client->request('GET', '/contacts/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertCount(3, $crawler->filter('table.table:first-of-type tr'));
        $this->assertEquals('Liste des contacts', $crawler->filter('title')->text());
    }

    public function testListAvecMock()
    {
        $client = static::createClient();

        $mock = $this->getMockBuilder(ContactDoctrineORMManager::class)
                    ->disableOriginalConstructor()
                    ->getMock();

        $mock->expects($this->once())
                ->method('getAll')
                ->willReturn([
                    (new Contact())->setId(1)->setPrenom('A')->setNom('B'),
                    (new Contact())->setId(2)->setPrenom('C')->setNom('D'),
                    (new Contact())->setId(3)->setPrenom('X')->setNom('Y'),
                ]);

        $client->getContainer()->set('app.manager.contact_manager', $mock);

        $crawler = $client->request('GET', '/contacts/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertCount(4, $crawler->filter('table.table:first-of-type tr'));
        $this->assertEquals('Liste des contacts', $crawler->filter('title')->text());
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts/9');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts/add');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
