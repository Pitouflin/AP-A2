<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Commande;
use App\Entity\User;

class CommandeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 25; $i++){
            $user = new User("Client $i", "User$i@gmail.com", "1\placeholder\$i");
            $commande = new Commande();
            $commande->setPrixtotal($i*10*$i)
                    ->setTotalFidelite(round($i*10*$i, 0, PHP_ROUND_HALF_DOWN))
                    ->setLeClient($user)
                    ->setDateCommande(new \DateTime());
            $manager->persist($commande);
        }

        $manager->flush();
    }
}
