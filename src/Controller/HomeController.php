<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Matches;
use App\Entity\Tournament;
use App\Entity\Article;
use App\Entity\Map;
use App\Entity\Sponsor;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    #[Route('/', name: 'home')]
    public function index(): Response
    {

        $sponsor = $this->entityManager->getRepository(Sponsor::class)->findAll();

        $data = [
            'title' => 'Oxymore',
            'sponsors' => $sponsor

        ];

        return $this->render('site/home/index.html.twig', $data);
    }
}

?>