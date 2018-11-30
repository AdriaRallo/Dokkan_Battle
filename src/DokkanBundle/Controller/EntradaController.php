<?php

namespace DokkanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use DokkanBundle\Entity\Entrada;
use DokkanBundle\Form\EntradaType;


class EntradaController extends Controller
{
	private $session;
	
	public function __construct() {
		$this->session=new Session();
	}
        
        public function indexAction(Request $request){		
		$em = $this->getDoctrine()->getEntityManager();
		$entrada_repo=$em->getRepository("DokkanBundle:Entrada");
                $entrades=$entrada_repo->findAll();
               
		
                return $this->render("DokkanBundle:Entrada:index.html.twig",array(
			"entrades" => $entrades,

		));

	}
	
	public function addAction(Request $request){
		$entrada = new Entrada();
		$form = $this->createForm(EntradaType::class,$entrada);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				$em = $this->getDoctrine()->getEntityManager();
				$entrada_repo=$em->getRepository("DokkanBundle:Entrada");
				$categoria_repo=$em->getRepository("DokkanBundle:Categoria");
				
				$entrada = new Entrada();
				$entrada->setTitol($form->get("titol")->getData());
				$entrada->setContingut($form->get("contingut")->getData());
//				$entrada->setStatus($form->get("status")->getData());
				
//				// upload file
//				$file=$form["image"]->getData();
//				
//				if(!empty($file) && $file!=null){
//					$ext=$file->guessExtension();
//					$file_name=time().".".$ext;
//					$file->move("uploads",$file_name);
//
//					$entrada->setImage($file_name);
//				}else{
//					$entrada->setImage(null);
//				}
				
				$categoria = $categoria_repo->find($form->get("categoria")->getData());
				$entrada->setCategoria($categoria);
				
				$user=$this->getUser();
				$entrada->setUsuari($user);
				
				$em->persist($entrada);
				$flush=$em->flush();
				
				
				if($flush==null){
					$status = "Entrada creada correctament.";
				}else{
					$status ="Alguna cosa ha fallat";
				}
				
			}else{
				$status = "Formulari no vàlid. Entrada no creada.";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("dokkan_index_entrada");
		}
		
		
                return $this->render("DokkanBundle:Entrada:add.html.twig",array(
                        "form" => $form->createView()
                ));
            return 0;
	}
	
                public function deleteAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$entrada_repo=$em->getRepository("DokkanBundle:Entrada");
		$categoria_repo=$em->getRepository("DokkanBundle:Categoria");
		
		$entrada=$entrada_repo->find($id);
		
		if(is_object($entrada)){
			$em->remove($entrada);
			$em->flush();
		}
		
		return $this->redirectToRoute("dokkan_index_entrada");
	}
        
        
        public function editAction(Request $request, $id){
		$em = $this->getDoctrine()->getEntityManager();
		$entrada_repo = $em->getRepository("DokkanBundle:Entrada");
		$categoria_repo = $em->getRepository("DokkanBundle:Categoria");
		
		$entrada=$entrada_repo->find($id);
		
		$form = $this->createForm(EntradaType::class, $entrada);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				/*
					$entrada->setTitle($form->get("title")->getData());
					$entrada->setContent($form->get("content")->getData());
					$entrada->setStatus($form->get("status")->getData());
				 */

				$categoria = $categoria_repo->find($form->get("categoria")->getData());
				$entrada->setCategoria($categoria);
				
				$user=$this->getUser();
				$entrada->setUsuari($user);
				
				$em->persist($entrada);
				$flush=$em->flush();
				
		
				if($flush==null){
					$status = "Entrada editada correctament";
				}else{
					$status = "Alguna cosa ha fallat";
				}
				
			}else{
				$status = "Formulari no vàlid";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("dokkan_index_entrada");
		}
		
		return $this->render("DokkanBundle:Entrada:edit.html.twig",array(
			"form" => $form->createView(),
			"entrada" => $entrada,
		));
	}
        
	
}