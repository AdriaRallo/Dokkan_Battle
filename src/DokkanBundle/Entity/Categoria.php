<?php

namespace DokkanBundle\Entity;

/**
 * Categories
 */
class Categoria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    protected $Entrada;
    
    public function __construct() {
        $this->Entrada = new ArrayCollection();
                
    }

    public function __toString(){
        return $this->name;
    }

    public function getEntrada() {
        return $this->Entrada;
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categories
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
}

