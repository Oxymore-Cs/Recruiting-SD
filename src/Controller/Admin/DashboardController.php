<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\UserCrudController;
use App\Entity\User;
use App\Entity\Matches;
use App\Entity\Roster;
use App\Entity\Rounds;
use App\Entity\Tournament;
use App\Entity\Sponsor;
use App\Entity\Categorie;
use App\Entity\Role;
use App\Entity\Article;
use App\Entity\Map;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl();

        return $this->redirect($url);
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Oxymore Website')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);

        yield MenuItem::section('pre-pracc');
        yield MenuItem::linkToCrud('Maps', 'fa fa-map', Map::class);
        yield MenuItem::linkToCrud('Rosters', 'fa fa-users', Roster::class);
        yield MenuItem::linkToCrud('Roles', 'fa fa-user-tag', Role::class);

        yield MenuItem::section('pracc');
        yield MenuItem::linkToCrud('Matches', 'fa fa-gamepad', Matches::class);
        yield MenuItem::linkToCrud('Rounds', 'fa fa-circle', Rounds::class);
        yield MenuItem::linkToCrud('Tournaments', 'fa fa-trophy', Tournament::class);

        yield MenuItem::section('Blog');
        yield MenuItem::linkToCrud('Categories', 'fa fa-folder', Categorie::class);
        yield MenuItem::linkToCrud('Articles', 'fa fa-newspaper', Article::class);

        yield MenuItem::section('Sponsors');
        yield MenuItem::linkToCrud('Sponsors', 'fa fa-handshake', Sponsor::class);

        yield MenuItem::section('Newsletter');
        yield MenuItem::linkToCrud('Newsletter', 'fa fa-envelope', User::class);

    }
}
