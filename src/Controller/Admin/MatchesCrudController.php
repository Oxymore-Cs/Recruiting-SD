<?php

namespace App\Controller\Admin;

use App\Entity\Matches;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

use Doctrine\ORM\EntityManagerInterface;

class MatchesCrudController extends AbstractCrudController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Matches::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield FormField::addTab('Information'),
            yield AssociationField::new('bo_format'),
            yield DateTimeField::new('match_date'),
            yield AssociationField::new('tournament'),
            yield ImageField::new('image_team_a')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setRequired(false),
            yield ImageField::new('image_team_b')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setRequired(false),
                
            yield FormField::addTab('Teams'),
            yield IdField::new('id')
                ->hideOnForm(),
            yield TextField::new('team_a'),
            yield TextField::new('team_b'),
            yield FormField::addTab('Score'),
            yield IntegerField::new('score_team_a'),
            yield IntegerField::new('score_team_b'),

        ];
    }

}
