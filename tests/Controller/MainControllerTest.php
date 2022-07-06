<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\MainController
 */
class MainControllerTest extends WebTestCase
{
    /**
     * @covers \App\Controller\MainController::index()
     */
    public function testIndex(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        // Validate a successful response and some content
        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('button', 'Login');
    }
}
