<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\User;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\File\File;


class AppFixtures extends Fixture
{

    // constructeur php8
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    { }


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new User();
        $admin->setUsername("Admin")->setRoles(["ROLE_ADMIN","ROLE_USER"])->setNom("null")->setPrenom("null")->setEmail("null@test.com")->setAdresse("null");
        $admin->setPassword($this->passwordHasher->hashPassword($admin,"adminmdp"));
        $manager->persist($admin);

        $userTest = new User();
        $userTest->setUsername("d.paul")->setRoles(["ROLE_USER"])->setNom("Durand")->setPrenom("Paul")->setEmail("d.paul@test.com")->setAdresse("15 rue François vaux de foletiers");
        $userTest->setPassword($this->passwordHasher->hashPassword($userTest,"adminmdp"));
        $manager->persist($userTest);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Ordinateurs portables");
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setNomCategorie("Ordinateurs fixes");
        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setNomCategorie("Claviers");
        $manager->persist($categorie3);

        $categorie4 = new Categorie();
        $categorie4->setNomCategorie("Souris");
        $manager->persist($categorie4);

        $categorie5 = new Categorie();
        $categorie5->setNomCategorie("Tapis de souris");
        $manager->persist($categorie5);

        $categorie6 = new Categorie();
        $categorie6->setNomCategorie("Cartes graphiques");
        $manager->persist($categorie6);

        $categorie7 = new Categorie();
        $categorie7->setNomCategorie("Processeurs");
        $manager->persist($categorie7);

        $categorie8 = new Categorie();
        $categorie8->setNomCategorie("Disques durs");
        $manager->persist($categorie8);

        $categorie9 = new Categorie();
        $categorie9->setNomCategorie("Barettes de Memoire vive");
        $manager->persist($categorie9);
        $manager->flush();

        // Pc Fixes
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/pc_fix_placeholder.jpg");
            $produit = new Produit();
            $produit->setNom("PC Fixe no".$i);
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("pc_fix_placeholder.jpg");
            $produit->setNom("PC Fixe no".$i);
            $produit->setPrix(rand(599,2199));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie2);
            $manager->persist($produit);

        }
        // Pc portables
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/pc_portable_placeholder.jpg");
            $produit = new Produit();
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("pc_portable_placeholder.jpg");
            $produit->setNom("PC portable no".$i);
            $produit->setPrix(rand(400,1000));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie1);
            $manager->persist($produit);
        }

        // Claviers
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/clavier_placeholder.jpg");
            $produit = new Produit();
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("clavier_placeholder.jpg");
            $produit->setNom("clavier no".$i);
            $produit->setPrix(rand(20,1699));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie3);
            $manager->persist($produit);
        }

        // Souris
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/souris_placeholder.jpg");
            $produit = new Produit();
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("souris_placeholder.jpg");
            $produit->setNom("Souris no".$i);
            $produit->setPrix(rand(20,1699));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie4);
            $manager->persist($produit);
        }

        // Tapis de souris
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/tapis_souris_placeholder.jpg");
            $produit = new Produit();
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("tapis_souris_placeholder.jpg");
            $produit->setNom("Tapis de souris no".$i);
            $produit->setPrix(rand(1,299));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie5);
            $manager->persist($produit);
        }

        // Carte graphiques
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/cg_placeholder.jpg");
            $produit = new Produit();
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("cg_placeholder.jpg");
            $produit->setNom("Carte Graphique no".$i);
            $produit->setPrix(rand(129,2999));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie6);
            $manager->persist($produit);
        }

        // Processeurs
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/processeur_placeholder.jpg");
            $produit = new Produit();
            $produit->setNom("Processeur no".$i);
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("processeur_placeholder.jpg");
            $produit->setPrix(rand(20,1999));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie7);
            $manager->persist($produit);
        }

        // Disques durs
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/disque_placeholder.jpg");
            $produit = new Produit();
            $produit->setNom("Disque dur no".$i);
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("disque_placeholder.jpg");
            $produit->setPrix(rand(20,699));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie8);
            $manager->persist($produit);
        }

        // Memoire Ram
        for ($i = 1 ; $i <=10;$i++){
            $img = new File("./public/img/ram_placeholder.jpg");
            $produit = new Produit();
            $produit->setNom("Memoire Ram no".$i);
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("ram_placeholder.jpg");
            $produit->setPrix(rand(29,299));
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie9);
            $manager->persist($produit);
        }
        $manager->flush();
    }
}
