<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new("Username")->setRequired(true)->setLabel("Nom d'utilisateur"),
            TextField::new("Nom")->setRequired(true),
            TextField::new("Prenom")->setRequired(true),
            EmailField::new("Email")->setRequired(true)->setLabel("Adresse email"),
            TextField::new("adresse")->setRequired(true)->setLabel("Adresse de livraison"),
            TextField::new("password")->setLabel("Mot de passe")->setRequired(true)->setFormType(PasswordType::class)->hideOnIndex(),
            TextField::new("confirmPassword")->setLabel("Confirmez le mot de passe")->setRequired(true)->setFormType(PasswordType::class)->hideOnIndex(),
        ];
    }

}
