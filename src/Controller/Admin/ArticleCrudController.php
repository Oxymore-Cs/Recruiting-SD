<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use Doctrine\ORM\EntityManagerInterface;

class ArticleCrudController extends AbstractCrudController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield FormField::addTab('General'),
            yield IdField::new('id')
                ->hideOnForm(),
            yield TextField::new('title'),
            yield AssociationField::new('category'),
            yield FormField::addTab('Content'),
            yield TextEditorField::new('first_paragraph'),
            yield TextField::new('second_title'),
            yield TextEditorField::new('second_paragraph'),
            yield TextField::new('third_title'),
            yield TextEditorField::new('third_paragraph'),
            yield TextField::new('fourth_title'),
            yield TextEditorField::new('fourth_paragraph'),
            yield FormField::addTab('Image'),
            yield ImageField::new('first_image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/'),
            yield ImageField::new('second_image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setRequired(false),
            yield ImageField::new('third_image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setRequired(false),
            yield DateTimeField::new('publication_date')
                ->hideOnForm(),

        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Article) {
            $entityInstance->setPublicationDate(new \DateTime());
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Article) {
            $entityInstance->setPublicationDate(new \DateTime());
        }

        parent::updateEntity($entityManager, $entityInstance);
    }

}
