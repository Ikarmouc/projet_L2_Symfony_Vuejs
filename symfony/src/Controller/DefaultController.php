<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->redirectToRoute("produit_index");
    }

    #[Route('/panier', name: 'panier')]
    #[IsGranted("ROLE_ADMIN")]
    public function getPanier(ProduitRepository $produitRepository, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get("panier",[]);
        return $this->render('produit/index.html.twig', [
            'produits' => $panier,
        ]);
    }

    #[Route('/panier/add/{idProduit}/{count}', name: 'addProduct')]
    #[IsGranted("ROLE_ADMIN")]
    public function addProduct(ProduitRepository $produitRepository,$idProduit,$count = 1, Request $request): Response
    {
        $session = $request->getSession();

        $product = $produitRepository->find($idProduit);
        $panier = $session->get("panier",[]);
        $product->setImageFile(null);

        if (!empty($panier[$idProduit]))
        {
            $panier[$idProduit]+= $count;
        }else{
            $panier[$idProduit] = $count;
        }

        $session->set("panier",$panier);

        return $this->render('produit/index.html.twig', [
            'produits' => "ff",
        ]);
    }

    #[Route('/panier/delete/{idProduit}', name: 'removeProduct')]
    #[IsGranted("ROLE_ADMIN")]
    public function DeleteProductCart(ProduitRepository $produitRepository,$idProduit, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get("panier");
        $produitCible = $produitRepository->find($idProduit);
        $newPanier = array();
        foreach ($panier as $produit)
        {
            if ($produitCible->getNom() != $produit->getNom())
            {
                $newPanier[] = $produit;
            }
        }

        $session->set("panier",$newPanier);
        return $this->render('produit/index.html.twig', [
            'produits' => "ff",
        ]);
    }

    #[Route('/panier/delete/{idProduit}/{count}', name: 'removeProduct')]
    #[IsGranted("ROLE_ADMIN")]
    public function removeProduct(ProduitRepository $produitRepository,$idProduit,$count, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get("panier");
        $produitCible = $produitRepository->find($idProduit);

        $panier[$idProduit] -= $count;
        if ($panier[$idProduit] <=0 )
        {
            unset($panier[$idProduit]);
        }
        $session->set("panier",$panier);

        return $this->render('produit/index.html.twig', [
            'produits' => "ff",
        ]);
    }

    #[Route('/panier/wipe', name: 'resetPanier')]
    #[IsGranted("ROLE_ADMIN")]
    public function ViderPanier(ProduitRepository $produitRepository, Request $request): Response
    {
        $session = $request->getSession();
        $session->clear();
        return $this->render('produit/index.html.twig', [
            'produits' => "ff",
        ]);
    }


}
