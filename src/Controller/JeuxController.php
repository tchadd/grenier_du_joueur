<?php

namespace App\Controller;

use App\Form\JeuFormType;
use App\Repository\JeuRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jeu;
use Symfony\Component\HttpFoundation\Request;
class JeuxController extends AbstractController
{
    #[Route('/jeux', name: 'app_jeux')]
    public function index(JeuRepository $jeuRepository): Response
    {
        $jeux = $jeuRepository->findAll();
        return $this->render('jeux/index.html.twig', [
            'jeux' => $jeux
        ]);
    }

    #[Route('/jeux/modifier/{id}', name: 'app_jeux_modifier')]

    public function modifier(int $id,Jeu $jeu, Request $request, EntityManagerInterface $manager): Response
    {

        $jeuForm = $this->createForm(JeuFormType::class,$jeu);
        $jeuForm->handleRequest($request);

        if($jeuForm->isSubmitted() && $jeuForm->isValid()){

            $manager->persist($jeu);
            $manager->flush();
              // Redirect to a success page, or display a success message
              $this->addFlash('success', 'Le jeu a été ajouté avec succès.');

              return $this->redirectToRoute('app_jeux');
            }
            return $this->render('jeux/modifier/index.html.twig',
            ['jeuForm' => $jeuForm->createView()]
        );
    }

    #[Route('/jeux/detail/{id}', name: 'app_jeux_details')]

    public function detail(int $id,JeuRepository $jeuRepository):Response
    {
            $jeu = $jeuRepository->find($id);
            return $this->render('jeux/details/index.html.twig');
    }

    #[Route('/jeux/supprimer/{id}', name: 'app_jeux_supprimer')]

    public function supprimer(int $id,Jeu $jeu,JeuRepository $jeuRepository,EntityManagerInterface $manager):Response
    {
            $jeu = $jeuRepository->find($id);
            $manager->remove($jeu);
            $manager->flush();
            return $this->redirectToRoute('app_jeux');
    }

    #[Route('/jeux/ajouter', name: 'app_jeux_ajouter')]

    public function ajouer(Request $request, EntityManagerInterface $manager):Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $jeu  = new Jeu();
        $jeuForm = $this->createForm(JeuFormType::class,$jeu);
        $jeuForm->handleRequest($request);

        if($jeuForm->isSubmitted() && $jeuForm->isValid()){

            $manager->persist($jeu);
            $manager->flush();
              // Redirect to a success page, or display a success message
              $this->addFlash('success', 'Le jeu a été ajouté avec succès.');

              return $this->redirectToRoute('app_jeux');
            }
   return $this->render('jeux/ajouter/index.html.twig',
            ['jeuForm' => $jeuForm->createView()]
        );
    }

}
