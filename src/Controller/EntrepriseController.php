<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository=$doctrine->getRepository(Entreprise::class);
        $Entreprises=$repository->findAll();
        return $this->render('entreprise/index.html.twig', [
            'entreprises'=>$Entreprises,
        ]);
    }
}
