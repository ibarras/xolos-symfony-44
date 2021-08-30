<?php

namespace App\Tests\Frontend;

use App\Entity\IcTraduccion;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\IcTraduccionRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

class HomeControllerTest extends WebTestCase
{

    public function test_index_page(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/index');

        $this->getStatusMessage();

        $this->assertResponseIsSuccessful();
    }
    public function test_list_post_by_category(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/list', ['category' => 1]);

        $this->getStatusMessage();

        $this->assertResponseIsSuccessful();

    }

    public function test_show_single_post(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/show', ['parameter' => 1299]);

        $this->assertResponseIsSuccessful();

    }

}
