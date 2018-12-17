<?php

namespace DokkanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use DokkanBundle\Entity\Comentari;
use DokkanBundle\Form\ComentariType;
use DokkanBundle\Entity\Entrada;


class ComentariController extends Controller
{
    private $session;

    public function __construct() {
        $this->session=new Session();
    }
    
    public function indexAction(Request $request){		
		$em = $this->getDoctrine()->getEntityManager();
		$comentari_repo=$em->getRepository("DokkanBundle:Comentari");                
                $comentaris_2=$comentari_repo->findAll();

               
                $paginator = $this->get('knp_paginator');
                $comentaris = $paginator->paginate($comentaris_2, $request->query->getInt('page', 1), 3);
		
                return $this->render("DokkanBundle:Comentari:index.html.twig",array(
			"comentaris" => $comentaris,
		));
    }
    
	public function addAction(Request $request, $id){
		$comentari = new Comentari();
		$form = $this->createForm(ComentariType::class,$comentari);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				$em = $this->getDoctrine()->getEntityManager();
				$comentari_repo=$em->getRepository("DokkanBundle:Comentari");
				$entrada_repo=$em->getRepository("DokkanBundle:Entrada");
				
				$comentari = new Comentari();
				$comentari->setContingut($form->get("contingut")->getData());
				
                                $entrada=$entrada_repo->find($id);
#editat				#$entrada = $entrada_repo->find($form->get("entrada")->getData());
				$comentari->setEntrada($entrada);
				
				$user=$this->getUser();
				$comentari->setUsuari($user);
				
				$em->persist($comentari);
				$flush=$em->flush();
				
				
				if($flush==null){
					$status = "Comentari creat correctament.";
				}else{
					$status ="Alguna cosa ha fallat";
				}
				
			}else{
				$status = "Formulari no vàlid. Comentari no creat.";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("dokkan_index_entrada");
		}
		
		
                return $this->render("DokkanBundle:Comentari:add.html.twig",array(
                        "form" => $form->createView()
                ));
            return 0;
    }
    
    public function deleteAction($id){
		$em = $this->getDoctrine()->getEntityManager();
               
                $comentari_repo=$em->getRepository("DokkanBundle:Comentari");
		$entrada_repo=$em->getRepository("DokkanBundle:Entrada");
		
		$comentari=$comentari_repo->find($id);
		
		if(is_object($comentari)){
			$em->remove($comentari);
			$em->flush();
		}
		
		return $this->redirectToRoute("dokkan_index_entrada");
    }
    
   public function editAction(Request $request, $id){
		$em = $this->getDoctrine()->getEntityManager();
		$comentari_repo = $em->getRepository("DokkanBundle:Comentari");
		$entrada_repo = $em->getRepository("DokkanBundle:Entrada");
		
		$comentari=$comentari_repo->find($id);
		
		$form = $this->createForm(ComentariType::class, $comentari);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
                                #editat
                                #$entrada=$entrada_repo->find($id);
				$entrada = $entrada_repo->find($form->get("entrada")->getData());
                                #editat
				$comentari->setEntrada($entrada);
				
				$user=$this->getUser();
				$comentari->setUsuari($user);
				
				$em->persist($comentari);
				$flush=$em->flush();
				
		
				if($flush==null){
					$status = "Comentari editat correctament";
				}else{
					$status = "Alguna cosa ha fallat";
				}
				
			}else{
				$status = "Formulari no vàlid";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("dokkan_index_entrada");
		}
		
		return $this->render("DokkanBundle:Comentari:edit.html.twig",array(
			"form" => $form->createView(),
			"comentari" => $comentari,
		));
    }
    
}