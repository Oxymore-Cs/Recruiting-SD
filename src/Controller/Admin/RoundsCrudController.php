<?php

namespace App\Controller\Admin;

use App\Entity\Rounds;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class RoundsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rounds::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield FormField::addTab('Game'),
            yield IdField::new('id')
                ->hideOnForm(),
            yield AssociationField::new('game'),
            yield AssociationField::new('map'),
            yield FormField::addTab('Stats'),
            yield IntegerField::new('round_number')
                ->setFormTypeOption('attr', ['min' => 1, 'max' => 5]),
            yield IntegerField::new('score_team_a'),
            yield IntegerField::new('score_team_b'),
        ];
    }

}
