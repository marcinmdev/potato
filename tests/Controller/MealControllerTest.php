<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use App\Story\MealStory;
use App\Story\UserAccountStory;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @covers \App\Controller\MealController
 */
class MealControllerTest extends WebTestCase
{
    /**
     * @covers \App\Controller\MealController::index()
     */
    public function testIndex(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/meal/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Meal List');
    }

    /**
     * @covers \App\Controller\MealController::new()
     */
    public function testCreate(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/meal/new');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create new Meal');

        $client->submitForm('Save', [
            'meal[name]' => 'testMeal',
            'meal[ingredients]' => [1, 2],
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_SEE_OTHER);
    }

    /**
     * @covers \App\Controller\MealController::show()
     */
    public function testShow(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/meal/1');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', MealStory::MEAL_VEGETABLE_SALAD);
    }

    /**
     * @covers \App\Controller\MealController::edit()
     */
    public function testEdit(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/meal/1/edit');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Edit Meal');

        $client->submitForm('Update', [
            'meal[name]' => 'testMeal2',
            'meal[ingredients]' => [2, 3],
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_SEE_OTHER);
    }

    /**
     * @covers \App\Controller\MealController::delete()
     */
    public function testDelete(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/meal/1/edit');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Edit Meal');

        $client->submitForm('Delete', [], 'DELETE');
        $this->assertResponseStatusCodeSame(Response::HTTP_SEE_OTHER);
    }

    private function createClientWithLoggedInUser(): KernelBrowser
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);

        /** @var UserInterface $testUser */
        $testUser = $userRepository->findOneByEmail(UserAccountStory::USER_NAME);

        $client->loginUser($testUser);

        return $client;
    }
}
