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
    #[Route('/entreprise/{page<\d+>?1}/{nbre<\d+>?10}', name: 'app_entreprise')]
    public function index(ManagerRegistry $doctrine,$page,$nbre): Response
    {
        $repository=$doctrine->getRepository(Entreprise::class);
        $Entreprises=$repository->findBy([],['designation'=>'ASC'],limit:$nbre ,offset: $nbre*($page-1));
        $nbreEntreprise = $repository->count([]);
        $nbrePage=ceil($nbreEntreprise / $nbre);
        return $this->render('entreprise/index.html.twig', [
            'entreprises'=>$Entreprises,'nbre'=>$nbre,'page'=>$page,'nbrePages'=>$nbrePage
        ]);
    }






}
