<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use App\Story\IngredientStory;
use App\Story\UserAccountStory;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @covers \App\Controller\IngredientController
 */
class IngredientControllerTest extends WebTestCase
{
    /**
     * @covers \App\Controller\IngredientController::index()
     */
    public function testIndex(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/ingredient/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Ingredient List');
    }

    /**
     * @covers \App\Controller\IngredientController::new()
     */
    public function testCreate(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/ingredient/new');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create new Ingredient');

        $client->submitForm('Save', [
            'ingredient[name]' => 'testIngredient',
            'ingredient[weight]' => 11,
            'ingredient[price]' => 15,
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_SEE_OTHER);
    }

    /**
     * @covers \App\Controller\IngredientController::show()
     */
    public function testShow(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/ingredient/1');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', IngredientStory::INGREDIENT_POTATO);
    }

    /**
     * @covers \App\Controller\IngredientController::edit()
     */
    public function testEdit(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/ingredient/1/edit');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Edit Ingredient');

        $client->submitForm('Update', [
            'ingredient[name]' => 'testIngredient2',
            'ingredient[weight]' => 15,
            'ingredient[price]' => 11,
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_SEE_OTHER);
    }

    /**
     * @covers \App\Controller\IngredientController::delete()
     */
    public function testDelete(): void
    {
        $client = $this->createClientWithLoggedInUser();

        $client->request('GET', '/ingredient/1/edit');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Edit Ingredient');

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
