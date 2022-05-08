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


        for ($i = 0 ; $i <10;$i++){
            $img = new File("./public/img/pc_fix_placeholder.jpg");
            $produit = new Produit();
            $produit->setNom("PC Fixe no".$i);
            $produit->setDescription("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
            $produit->setImg("pc_fix_placeholder.jpg");
            $produit->setNom("PC Fixe no".$i);
            $produit->setPrix(599.99);
            $produit->setImageFile($img);
            $produit->setImageSize($img->getSize());
            $produit->setCategorie($categorie2);
            $manager->persist($produit);

        }

        $manager->flush();
    }
}
