<?php
namespace App\Controller\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RecetteRepository;
use App\Entity\Recette;
use App\Form\RecetteType;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
/**
 *
 */
class AdminRecetteController extends AbstractController
{
private $repository;
public function __construct(RecetteRepository $repository){

  $this->repository=$repository;

}
/**
 * @Route("/admin",name="admin.recette.index")
 */
public function index()
{
  $recettes=$this->repository->findAll();
  return $this->render('admin/plats/index.html.twig',compact('recettes'));
}
/**
 * @Route("/admin/{id}",name="admin.recette.edit")
 */
public function edit(Recette $Recette):response
{
  $form=$this->createForm(RecetteType::class, $Recette);
//  $recettes=$this->repository->find($id);
  return $this->render('admin/plats/edit.html.twig', [

  'form'=>$form->createView()
]);
}
}


















 ?>
