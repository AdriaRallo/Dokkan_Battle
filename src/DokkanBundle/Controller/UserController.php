<?php

namespace DokkanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DokkanBundle\Entity\Usuari;
use DokkanBundle\Form\UsuariType;
use Symfony\Component\HttpFoundation\Session\Session;


class UserController extends Controller
{
    
    private $session;
    
    public function __construct() {
        $this->session=new Session();
    }
    
    
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get("security.authentication_utils");
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
                
                $user = new Usuari();
		$form = $this->createForm(UsuariType::class,$user);
		
		$form->handleRequest($request);
                
                    
          if($form->isValid()){
                    $em=$this->getDoctrine()->getEntityManager();
                    $user_repo=$em->getRepository("DokkanBundle:Usuari");
                    $user = $user_repo->findOneBy(array("email"=>$form->get("email")->getData()));
				
                    if(count($user)==0){
                        $user = new Usuari();
                        $user->setNom($form->get("nom")->getData());
                        $user->setEmail($form->get("email")->getData());

                        $factory = $this->get("security.encoder_factory");
                        $encoder = $factory->getEncoder($user);
                        $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());
                        $user->setPassword($password);


                        $user->setRole("ROLE_USER");
                        $user->setFoto(null);

                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($user);
                        $flush = $em->flush();

                        if($flush==null){
                            $status = "Usuari creat correctament";
                        }else{
                            $status = "Alguna cosa ha fallat. Torna-ho a intentar";
                        }
                   
                        $this->session->getFlashBag()->add("status",$status);
                    }
                    else{
                        $status = "Aquest usuari ja existeix";
                        $this->session->getFlashBag()->add("status",$status);
                    }
          }
                
		return $this->render("DokkanBundle:User:login.html.twig", array(
			"error" => $error,
			"last_username" => $lastUsername,
                        "form" => $form->createView()
		)); 
        }
} 