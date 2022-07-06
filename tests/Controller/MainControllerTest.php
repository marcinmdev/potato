<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\MainController
 */
class MainControllerTest extends WebTestCase
{
    /**
     * @covers \MainController::index()
     */
    public function testIndex(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/main');

        // Validate a successful response and some content
        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'Hello');
    }
}
