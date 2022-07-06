<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use App\Story\UserAccountStory;
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

        $client->request('GET', '/login');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('button', 'Login');

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(UserAccountStory::USER_NAME);

        $client->loginUser($testUser);

        $client->request('GET', '/main');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello '.UserAccountStory::USER_NAME);
    }
}
