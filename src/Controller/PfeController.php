<?php

namespace App\Controller;

use App\Entity\Pfe;
use App\Form\PfeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe', name: 'app_pfe')]
    public function index(): Response
    {
        return $this->render('pfe/index.html.twig');
    }


    #[Route('/pfe/add', name: 'Pfe_add')]
    public function addPfe(ManagerRegistry $doctrine,Request $request): Response
    {
        $Pfe=new Pfe();
        $form =$this->createForm(PfeType::class, $Pfe);

        $form->handleRequest($request);
        if($form->isSubmitted()){

            $manager=$doctrine->getManager();
            $manager->persist($Pfe);
            $manager->flush();

            $this->addFlash($Pfe->getTitle(),"a ete ajouté");


            //dd($form->getData());//$personne
            return $this->render('pfe/detail-pfe.html.twig', [
                'form'=>$form->createView(),
            ]);

        }else{
            return $this->render("pfe/add_pfe.html.twig",['form'=>$form->createView()]);

        }


        /*return $this->render('personne/add-personne.html.twig', [
            'form'=>$form->createView(),
            ]);*/
    }


}
