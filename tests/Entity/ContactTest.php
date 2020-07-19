<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    private $contact;

    public function setUp() : void {
        $this->contact = new Contact('NOM', 'Prénom', 'email@outlook.com', '0110101010', 'visiteur');
    }

    public function testLastnameNotEmpty(){
        $this->assertNotEmpty($this->contact->getLastname());
    }

    public function testLastnameEmpty(){
        $this->contact->setLastName('');
        $this->assertEmpty($this->contact->getLastname());
    }

    public function testLastnameFormat(){
        $this->assertIsString($this->contact->getLastname());
    }

    public function testFirstnameNotEmpty(){
        $this->assertNotEmpty($this->contact->getFirstname());
    }

    public function testFirstnameEmpty(){
        $this->contact->setFirstname('');
        $this->assertEmpty($this->contact->getFirstname());
    }

    public function testFirstnameFormat(){
        $this->assertIsString($this->contact->getFirstname());
    }

    public function testEmailNotEmpty(){
        $this->assertNotEmpty($this->contact->getEmail());
    }

    public function testEmailEmpty(){
        $this->contact->setEmail('');
        $this->assertEmpty($this->contact->getEmail());
    }

    public function testEmailFormat(){
        $this->assertIsString($this->contact->getEmail());
    }

    public function testEmailValid(){
        $this->asserRegExp(FILTER_VALIDATE_EMAIL, $this->contact->getEmail());
    }

    public function testEmailInvalid(){
        $this->contact->setEmail('false.mail@mymail');
        $this->assertNotRegExp(FILTER_VALIDATE_EMAIL, $this->contact->getEmail());
    }

    public function testPhoneNumberFormat(){
        $this->assertIsString($this->contact->getPhoneNumber());
    }

    public function testValidPhoneNumber(){
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());

        $this->contact->setPhoneNumber('+33605500250');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());

        $this->contact->setPhoneNumber('01-05-50-02-50');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());
    }

    public function testInvalidPhoneNumber(){
        $this->contact->setPhoneNumber('03055002XX');
        $this->assertNotRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $this->contact->getPhoneNumber());
    }

    public function testTagNotEmpty(){
        $this->assertNotEmpty($this->contact->getTag());
    }

    public function testTagEmpty(){
        $this->contact->setTag('');
        $this->assertEmpty($this->contact->getTag());
    }

    public function testTagFormat(){
        $this->assertIsString($this->contact->getTag());
    }

    public function tearDown() : void {
        $this->contact = null;
    }
}

