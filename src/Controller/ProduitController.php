<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;


class ProduitController extends AbstractController
{
   /**
    * @Route("/", name="produit")
    */
    public function index(PersistenceManagerRegistry $doctrine): Response
    {
        $repo =$doctrine->getRepository(Produit::class);

        $produits = $repo->findAll();

        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits
        ]);
    }
    
    /**
     * @Route("/produit/new", name="produit_new")
     */
    public function create() {
        $produit = new Produit();

        $form = $this->createFormBuilder($produit)
                    ->add('nom')
                    ->add('prix')
                    ->add('prixfidelite')
                    ->add('image')
                    ->getForm();

        return $this->render('produit/create.html.twig',[
            'formProduit' => $form->createView()
        ]);
            
    }

    /**
     * @Route("/produit/{id}", name="produit_show")
     */
    public function show(Produit $produit){
        return $this->render('produit/show.html.twig', [
            'produit' => $produit
        ]);
    }


}
