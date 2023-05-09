<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use DateTime;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 25; $i++){
            $client = new Produit();
            $client->setNom("Produit n°$i")
                    ->setPrix($i+$i*$i*10)
                    ->setPrixFidelite($i+$i*$i)
                    ->setImage("http://placehold.it/350x100")
                    ->setCreatedAt(new \DateTime());
            $manager->persist($client);
        }

        $manager->flush();
    }
}
