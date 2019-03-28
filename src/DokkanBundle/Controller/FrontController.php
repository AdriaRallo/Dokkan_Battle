<?php

namespace DokkanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class FrontController extends Controller
{
    public function homeAction()
    {
        return $this->render('DokkanBundle:Front:index.html.twig');
    }
    
    public function personajesAction()
    {
        return $this->render('DokkanBundle:Front:personajes.html.twig');
    }
    
    public function pj_strAction()
    {
        return $this->render('DokkanBundle:Tipos_Personajes:str.html.twig');
    }
    
    public function pj_aglAction()
    {
        return $this->render('DokkanBundle:Tipos_Personajes:agl.html.twig');
    }
    
    public function pj_teqAction()
    {
        return $this->render('DokkanBundle:Tipos_Personajes:teq.html.twig');
    }
    
    public function pj_intAction()
    {
        return $this->render('DokkanBundle:Tipos_Personajes:int.html.twig');
    }
    
    public function pj_phyAction()
    {
        return $this->render('DokkanBundle:Tipos_Personajes:phy.html.twig');
    }
    
    public function pj_dokkanAction()
    {
        return $this->render('DokkanBundle:Tipos_Personajes:dokkan.html.twig');
    }
    
    public function itemsAction()
    {
        return $this->render('DokkanBundle:Front:items.html.twig');
    }
    
    public function it_awakeningAction()
    {
        return $this->render('DokkanBundle:Items:awakening.html.twig');
    }
    
    public function it_supportAction()
    {
        return $this->render('DokkanBundle:Items:support.html.twig');
    }
    
    public function it_locationsAction()
    {
        return $this->render('DokkanBundle:Items:locations.html.twig');
    }
    
    public function it_trainingAction()
    {
        return $this->render('DokkanBundle:Items:training.html.twig');
    }
    
    public function eventosAction()
    {
        return $this->render('DokkanBundle:Front:eventos.html.twig');
    }
    
    public function torneosAction()
    {
        return $this->render('DokkanBundle:Front:torneos.html.twig');
    }
    
    public function aboutAction()
    {
        return $this->render('DokkanBundle:Front:about.html.twig');
    }
    
    public function contactAction()
    {
        return $this->render('DokkanBundle:Front:contact.html.twig');
    }
    
}
