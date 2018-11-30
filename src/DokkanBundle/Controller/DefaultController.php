<?php

namespace DokkanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DokkanBundle:Default:index.html.twig');
    }
    
    public function langAction(Request $request){

            return $this->redirectToRoute("dokkan_index_entrada");
    }
    
}
