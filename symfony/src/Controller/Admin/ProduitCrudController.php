<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Repository\CategorieRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Field\VichImageField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
                IdField::new('id')->hideOnForm(),
                TextField::new('nom'),
                TextField::new('description')->setFormType(TextareaType::class),
                MoneyField::new('prix')->setCurrency('EUR')->setStoredAsCents(),
                AssociationField::new("categorie")->setTextAlign("center"),
                ImageField::new('img')->setUploadDir('./public/img')->hideOnForm()->setBasePath("./img/"),
                VichImageField::new('imageFile')->hideOnIndex()->hideOnDetail(),
        ];

    }

}
