<?php

namespace App\Story;

use App\Entity\UserAccount;
use App\Factory\UserAccountFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\Story;

final class UserAccountStory extends Story
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function build(): void
    {
        UserAccountFactory::createOne(['email' => 'test@test.test', 'password' => $this->passwordHasher->hashPassword(new UserAccount(), 'test')]);
    }
}
