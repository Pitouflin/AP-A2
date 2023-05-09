<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Produit;

class Cart{
    private $requestStack;

    private EntityManagerInterface $em;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;
    }

    public function ajoutCart($id){


        $cart = $this->getSession()->get('cart', []);
        dd($cart);
        //if (!empty($cart)) {
        //    if (isset($cart[$id])) {
        //        $cart[$id]++;
        //    } else {
        //        $cart[$id] = 1;
        //    }
        //} else {
        //    $cart[$id] = 1;
        }
        



    //public function removeAllFromCart(){
    //    return $this->getSession()->remove('cart'); 
    //}

    public function getTotal():array{
        $cart = $this->getSession()->get('cart');
        $cartData = [];
        if (is_array($cart) || is_object($cart)){
        foreach($cart as $id=>$quantite){
            if($cart){
            $produit = $this->em->getRepository(Produit::class)->findOneBy(['id'=>$id]);
            if(!$produit){

            }
            $cartData[]= [
                'produit'=> $produit,
                'quantite'=> $quantite
            ];
        }
    }
}

        return $cartData;
    }


    private function getSession():SessionInterface{

        return $this->requestStack->getSession();
    }


}