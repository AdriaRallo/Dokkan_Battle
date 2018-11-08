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

    protected $entrada;
    
    public function __construct() {
        $this->entrada = new ArrayCollection();
                
    }

    public function __toString(){
        return $this->entrada;
    }

    public function getEntrada() {
        return $this->entrada;
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

