<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest  extends WebTestCase
{
    public function testContact()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');

        /** @var TYPE_NAME $this */
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}