<?php

namespace DokkanBundle\Entity;

/**
 * Comentari
 */
class Comentari
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contingut;

    /**
     * @var \DokkanBundle\Entity\Entrada
     */
    private $entrada;

    /**
     * @var \DokkanBundle\Entity\Usuari
     */
    private $usuari;


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
     * Set contingut
     *
     * @param string $contingut
     *
     * @return Comentari
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
     * Set entrada
     *
     * @param \DokkanBundle\Entity\Entrada $entrada
     *
     * @return Comentari
     */
    public function setEntrada(\DokkanBundle\Entity\Entrada $entrada = null)
    {
        $this->entrada = $entrada;

        return $this;
    }

    /**
     * Get entrada
     *
     * @return \DokkanBundle\Entity\Entrada
     */
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * Set usuari
     *
     * @param \DokkanBundle\Entity\Usuari $usuari
     *
     * @return Comentari
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

