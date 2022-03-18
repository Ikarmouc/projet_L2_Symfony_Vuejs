<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Ordinateurs fixes");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Claviers");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Souris");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Tapis de souris");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Cartes graphiques");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Processeurs");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Disques durs");
        $manager->persist($categorie1);

        $categorie1 = new Categorie();
        $categorie1->setNomCategorie("Barettes de Memoire vive");
        $manager->persist($categorie1);


        $manager->flush();
    }
}
