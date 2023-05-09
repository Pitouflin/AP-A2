<?php

namespace App\Controller;

use App\Form\CommandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Commande;
use App\Entity\Produit;
use DateTime;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande/new", name="commande_new")
     */
    public function create(Request $request, ManagerRegistry $manager){

        $commande = new Commande();

        $form = $this->createForm(CommandeType::class, $commande);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $commande->setDateCommande(new DateTime());
            $commande->setLeClient($this->getUser());
            $lesProduits = $commande->getProduits();
            $commande->setTotalFidelite(round($commande->getPrixtotal()/10, 0, PHP_ROUND_HALF_UP));

            $manager->getManager()->persist($commande);
            $manager->getManager()->flush();
        }

        

        return $this->render('commande/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
