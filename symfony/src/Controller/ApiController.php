<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Produit;
use App\Repository\AvisRepository;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;


class ApiController extends AbstractController
{

    #[Route('/api/products/add', name: 'api_add_product',methods: ["POST"])]
    public function addProduct(Request $request ,CategorieRepository $categorieRepository,SerializerInterface $serializer)
    {
        $manager = $this->getDoctrine()->getManager();

        $jsonReceive = $request->get('data',);
        $file = $request->files->get('img');

        $content = json_decode($jsonReceive);
        $produit = new Produit();
        $produit->setNom($content->nom);
        $produit->setPrix($content->prix*100);
        $produit->setImageFile($file);
        $produit->setDescription($content->description);
        $produit->setImg($produit->getImageFile()->getFilename());
        $produit->setCategorie($categorieRepository->find($content->categorie));
        $manager->persist($produit);
        $manager->flush();
        $response = $this->json($produit,201,[],["groups" => ["product"]]);

        return $response;

    }

    #[Route('/api/products/delete/{id}', name: 'api_delete_product',methods: ["POST"])]
    public function deleteProduct(Request $request ,int $id,ProduitRepository $produitRepository)
    {
        $manager = $this->getDoctrine()->getManager();
        $produit = $produitRepository->find($id);
        $manager->remove($produit);
        $manager->flush();
        $response = $this->json($produit,201,[],["groups" => ["product"]]);

        return $response;

    }

    #[Route('/api/avis/add/{idProd}', name: 'api_add_avis',methods: ["POST"])]
    public function addAvis(Request $request ,ProduitRepository $produitRepository,$idProd,SerializerInterface $serializer)
    {
        $manager = $this->getDoctrine()->getManager();

        $jsonReceive = $request->getContent();
        $content = $serializer->deserialize($jsonReceive,Avis::class,'json');
        $content->setProduit($produitRepository->find($idProd));
        $content->setDateAvis(new \DateTimeImmutable("d/m/Y"));
        $manager->persist($content);
        $manager->flush();
        $response = $this->json($content,201,[],["groups" => ["avis"]]);

        return $response;

    }

    #[Route('/api/avis/delete/{id}', name: 'api_delete_avis',methods: ["POST"])]
    public function deleteAvis(Request $request ,int $id,AvisRepository $avisRepository)
    {
        $manager = $this->getDoctrine()->getManager();
        $avis = $avisRepository->find($id);
        $manager->remove($avis);
        $manager->flush();
        $response = $this->json($avis,201,[],["groups" => ["avis"]]);
        return $response;
    }

    /*
    #[Route('/api/avis/update/{id}', name: 'api_update_avis',methods: ["POST"])]
    public function updateAvis(Request $request ,AvisRepository $avisRepository,$id,SerializerInterface $serializer)
    {
        $manager = $this->getDoctrine()->getManager();
        $jsonReceive = $request->getContent();
        $content = $avisRepository->find($id);

        $content = $serializer->deserialize($jsonReceive,Avis::class,'json');
        $content->setDateAvis(new \DateTimeImmutable());
        $manager->persist($content);
        $manager->flush();
        $response = $this->json($content,201,[],["groups" => ["avis"]]);

        return $response;

    }*/


    #[Route('/api/products', name: 'api_get_products',methods: ["GET"])]
    public function getAllProducts(ProduitRepository $produitRepository,CategorieRepository $categorieRepository,NormalizerInterface $serializer)
    {
        $produits = $produitRepository->findAll();

        //dump($produits[0]->getCategorie()->getId());
        foreach ($produits as $produit){
            $produit->setCategorie($categorieRepository->find($produit->getCategorie()->getId()));
        }
        $response = $this->json($produits,200,[
            "Content-Type"=> "application/json"
        ],['groups'=>"product"]);

        return $response;
    }


    #[Route('/api/product/{id}', name: 'api_get_product',methods: ["GET"])]
    public function getProduct(ProduitRepository $produitRepository,NormalizerInterface $serializer,int $id)
    {
        $produit = $produitRepository->find($id);
        $response = $this->json($produit,200,[
            "Content-Type"=> "application/json"
        ],['groups'=>"product"]);

        return $response;
    }

    #[Route('/api/categories', name: 'api_get_categories',methods: ["GET"])]
    public function getAllCategories(CategorieRepository $categorieRepository,NormalizerInterface $serializer)
    {
        $categories = $categorieRepository->findAll();

        $response = $this->json($categories,200,[
            "Content-Type"=> "application/json"
        ],['groups'=>"categories"]);

        return $response;

    }

    #[Route('/api/categorie/{id}', name: 'api_get_categorie',methods: ["GET"])]
    public function getCategorie(CategorieRepository $categorieRepository,int $id,NormalizerInterface $serializer)
    {
        $categories = $categorieRepository->find($id);

        $response = $this->json($categories,200,[
            "Content-Type"=> "application/json"
        ],['groups'=>"categories"]);

        return $response;

    }


    #[Route('/api/avis/{productId}', name: 'api_get_categorie',methods: ["GET"])]
    public function getAvis(AvisRepository $avisRepository,int $productId,NormalizerInterface $serializer)
    {
        $avis = $avisRepository->findByProductId($productId);

        $response = $this->json($avis,200,[
            "Content-Type"=> "application/json"
        ],['groups'=>"avis"]);

        return $response;

    }



}
