<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\LoginController
 */
class LoginControllerTest extends WebTestCase
{
    /**
     * @covers \App\Controller\LoginController::index()
     */
    public function testIndex(): void
    {
        $client = static::createClient();

        $client->request('GET', '/login');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('button', 'Login');
    }
}
