<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    /*
    public function test1plus1Egal2()
    {
        $this->assertEquals(2, 1 + 1, "1 + 1 = 2");
    }
    */
    /**
     * @var Contact
     */
    protected $contact;

    public function setUp()
    {
        $this->contact = new Contact();
    }

    public function tearDown()
    {
        $this->contact = null;
    }

    public function testGetSetPrenom()
    {
        $this->assertNull($this->contact->getPrenom());
        $this->assertEquals($this->contact, $this->contact->setPrenom('Jean'));
        $this->assertEquals('Jean', $this->contact->getPrenom());
    }

    public function testGetSetNom()
    {
        $this->assertNull($this->contact->getNom());
        $this->assertEquals($this->contact, $this->contact->setNom('Dupont'));
        $this->assertEquals('Dupont', $this->contact->getNom());
    }
}