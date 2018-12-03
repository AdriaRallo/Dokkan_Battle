<?php

namespace DokkanBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Entrada
 */
class Entrada
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titol;

    /**
     * @var string
     */
    private $contingut;

    /**
     * @var \DokkanBundle\Entity\Categoria
     */
    private $categoria;

    /**
     * @var \DokkanBundle\Entity\Usuari
     */
    private $usuari;

     protected $comentari;
    
    public function __construct() {
        $this->comentari = new ArrayCollection();
                
    }

    public function __toString(){
        return $this->contingut;
    }
    
//    public function __toString(){
//        if(is_null($this->comentari)) {
//            return 'NULL';
//        }
//        return $this->comentari;
//    }

    public function getComentari() {
        return $this->comentari;
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
     * Set titol
     *
     * @param string $titol
     *
     * @return Entrada
     */
    public function setTitol($titol)
    {
        $this->titol = $titol;

        return $this;
    }

    /**
     * Get titol
     *
     * @return string
     */
    public function getTitol()
    {
        return $this->titol;
    }

    /**
     * Set contingut
     *
     * @param string $contingut
     *
     * @return Entrada
     */
    public function setContingut($contingut)
    {
        $this->contingut = $contingut;

        return $this;
    }

    /**
     * Get contingut
     *
     * @return string
     */
    public function getContingut()
    {
        return $this->contingut;
    }

    /**
     * Set categoria
     *
     * @param \DokkanBundle\Entity\Categoria $categoria
     *
     * @return Entrada
     */
    public function setCategoria(\DokkanBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \DokkanBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set usuari
     *
     * @param \DokkanBundle\Entity\Usuari $usuari
     *
     * @return Entrada
     */
    public function setUsuari(\DokkanBundle\Entity\Usuari $usuari = null)
    {
        $this->usuari = $usuari;

        return $this;
    }

    /**
     * Get usuari
     *
     * @return \DokkanBundle\Entity\Usuari
     */
    public function getUsuari()
    {
        return $this->usuari;
    }
}

