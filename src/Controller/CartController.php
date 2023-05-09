<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Cart;


class CartController extends AbstractController
{

    /**
     * @Route("/cart", name="cart_index")
     */
    public function index(Cart $cart): Response
    {
        return $this->render('cart/index.html.twig',[
            'cart'=>$cart->getTotal()
        ]);
    }

    #[Route('/cart/add/{id}', name: 'ajoutCart')]
    public function addToRoute(Cart $cart, Produit $produit): Response
    {
        $cart->ajoutCart($produit);
        return $this->redirectToRoute('cart_index');
    }

    /**
     * @Route("/cart/removeAll", name="cart_removeAll")
     */
    public function removeAll(Cart $cart): Response
    {
        $cart->removeAllFromCart();

        return $this->redirectToRoute('produit');
    }
}
