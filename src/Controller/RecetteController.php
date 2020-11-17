<?php

namespace App\Controller;
use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{

  public function __construct(RecetteRepository $repository, EntityManagerInterface $em)
  {
  $this->repository= $repository;
  $this->em= $em;
  }
  /**
   * @Route("/show",name="app_recettes_show",methods="GET")
   */
    public function index(RecetteRepository $repo) : Response
    {
        return $this->render('recette/index.html.twig', [
            'recette' => $repo->findAll(),
        ]);
    }
    /**
    * @Route("/recette/create",methods="GET|PATCH|POST",name="app_recettes_create")
    */

    public function create(Request $request,EntityManagerInterface $em): Response
    {
            $recettes=new Recette();
            $recettes->setNomRecette('Chicken recipes');
            $recettes->setDescriptionRecette('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore eborum.');
            $em->persist($recettes);
            $em->flush();
            return $this->redirectToRoute('app_home');
    }
    /**
     * @Route("/show/{slug}-{id}",name="menu.show",requirements={"slug":"[a-z0-9\-]*"})
     */
    public function show($slug,$id):Response
    {

              $recettes=$this->repository->find($id);
              return $this->render('recette/show.html.twig', [
              'plat'=>$recettes

      ]);
    }
}
