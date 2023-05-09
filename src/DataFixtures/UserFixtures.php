<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 25; $i++){
            $password = "$i\placehold\$i";
            $user = new User();
            $user->setEmail("User$i@gmail.com")
                    ->setUsername("User n°$i")
                    ->setPassword($password);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
