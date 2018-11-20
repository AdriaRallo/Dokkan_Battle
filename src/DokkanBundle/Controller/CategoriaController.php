<?php

namespace DokkanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use DokkanBundle\Entity\Categoria;
use DokkanBundle\Form\CategoriaType;


class CategoriaController extends Controller
{
	private $session;
	
	public function __construct() {
		$this->session=new Session();
	}

	public function indexAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$categoria_repo=$em->getRepository("DokkanBundle:Categoria");
		$categories=$categoria_repo->findAll();
		
		return $this->render("DokkanBundle:Categoria:index.html.twig",array(
			"categories" => $categories
		));
	}
	
	public function addAction(Request $request){
		$categoria = new Categoria();
		$form = $this->createForm(CategoriaType::class,$categoria);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				$em = $this->getDoctrine()->getEntityManager();
				
				$categoria = new Categoria();
				$categoria->setNom($form->get("nom")->getData());
				
				$em->persist($categoria);
				$flush = $em->flush();
				
				if($flush==null){
					$status = "Categoria creada correctament";
				}else{
					$status ="Categoria no afegida";
				}
				
			}else{
				$status = "Categoria no afegida perquè el formulari no és vàlid";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("dokkan_index_categoria");
		}
		
		
		return $this->render("DokkanBundle:Categoria:add.html.twig",array(
			"form" => $form->createView()
		));
	}
	
	public function deleteAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$categoria_repo=$em->getRepository("DokkanBundle:Categoria");
		$categoria=$categoria_repo->find($id);
		
		if(count($categoria->getEntrades())==0){
			$em->remove($categoria);
			$em->flush();
		}
		
		return $this->redirectToRoute("dokkan_index_categoria");
	}
        
        public function editAction(Request $request, $id){
		$em = $this->getDoctrine()->getEntityManager();
		$categoria_repo=$em->getRepository("DokkanBundle:Categoria");
		$categoria=$categoria_repo->find($id);
		
		$form = $this->createForm(CategoriaType::class,$categoria);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				$categoria->setNom($form->get("nom")->getData());
				
				$em->persist($categoria);
				$flush = $em->flush();
				
				if($flush==null){
					$status = "La categoria se ha editado correctamente !!";
				}else{
					$status ="Error al editar la categoria!!";
				}
				
			}else{
				$status = "La categoria no s'ha editat, porque el formulario no és vàlido !!";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("dokkan_index_categoria");
		}
		
		return $this->render("DokkanBundle:Categoria:edit.html.twig",array(
			"form" => $form->createView()
		));
	}
        
}