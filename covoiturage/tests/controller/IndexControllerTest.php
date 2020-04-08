<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\WebTestCase;

class IndexControllerTest extends WebTestCase {
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testHomepageLinkConnexion()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/home/connexion');

        $link = $crawler->selectLink('Connexion')->link();
        
        $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('/login', $client->getRequest()->getPathInfo());
    }

    public function testHomepageLinkRegister()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Sign up')->link();
        
        $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('/register', $client->getRequest()->getPathInfo());
    }

    public function testHomepageLinkResearchTrajet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Rechercher trajet')->link();
        
        $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('/research-trajet', $client->getRequest()->getPathInfo());
    }
}