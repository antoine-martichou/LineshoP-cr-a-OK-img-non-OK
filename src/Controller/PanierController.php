<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ArticlesRepository;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier/index", name="panier")
     */
    public function index(SessionInterface $session, ArticlesRepository $articlesRepository)
    {
        $panier = $session->get('panier', []);

        $panierEnrichi = [];

        foreach($panier as $id => $quantity)
        {
          $panierEnrichi[] = [
            'article' => $articlesRepository->find($id),
            'quantity' => $quantity
          ];
        }

        $total = 0;

        foreach($panierEnrichi as $produit){
          $totalProduit = $produit['article']->getPrice() * $produit['quantity'];
          $total += $totalProduit;
        }

        return $this->render('panier/index.html.twig', [
            'produits' => $panierEnrichi, 'total' => $total,
        ]);
    }


    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function add($id, SessionInterface $session)
    {

      $panier = $session->get('panier', []);

      if(!empty($panier[$id]))
      {
        $panier[$id]++;
      } else
      {
        $panier[$id] = 1;
      }

      $session->set('panier', $panier);

      return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier/addOne/{id}", name="panier_addOne")
     */
    public function addOne($id, SessionInterface $session)
    {

      $panier = $session->get('panier', []);
      $panier[$id]++;
      $session->set('panier', $panier);
      return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier/moinOne/{id}", name="panier_moinOne")
     */
    public function moinOne($id, SessionInterface $session)
    {
      $panier = $session->get('panier', []);
      if($panier[$id] <= 1)
      {
        unset($panier[$id]);
        
      }
      else
      {
        $panier[$id]--;
        
      }
      $session->set('panier', $panier);
      
      return $this->redirectToRoute('panier');
    }

    /**
      * @Route("/panier/delete/{id}", name="panier_delete")
      */
    public function delete($id, SessionInterface $session)
    {
      $panier = $session->get('panier', []);

      if(!empty($panier[$id])) {
        unset($panier[$id]);
      }

      $session->set('panier', $panier);

      return $this->redirectToRoute('panier');

    }
}
