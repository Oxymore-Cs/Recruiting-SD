<?php

namespace App\Controller\Admin;

use App\Entity\Roster;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Doctrine\ORM\EntityManagerInterface;

class RosterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Roster::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            yield IdField::new('id')
                ->hideOnForm(),
            yield TextField::new('name'),
            yield BooleanField::new('substitute')
                ->setRequired(false)
                ->setFormTypeOption('mapped', true),          
            yield ImageField::new('profile_picture')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            yield AssociationField::new('roles')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ])
                ->setRequired(false),
        ];
    }
}