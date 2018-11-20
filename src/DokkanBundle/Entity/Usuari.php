<?php

namespace DokkanBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Usuari
 */
class Usuari implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $foto;

    
    
    private $role;
    protected $entrada;
    protected $comentari;
    
    public function __construct() {
        $this->entrada = new ArrayCollection();
        $this->comentari = new ArrayCollection();
                
    }

    public function __toString(){
        return $this->entrada;
    }

    public function getEntrada() {
        return $this->entrada;
    }
    public function getComentari() {
        return $this->comentari;
    }
        
   
    public function getUsername() {
        return $this -> email;
    }
    
    public function getSalt() {
        return null;
    }
    
    public function getRoles() {
        return array($this->getRole());
    }
    
    public function eraseCredentials() {
        
    }
    
//    public function __toString(){
//        return $this->password;
//    }
//
//    public function getEntrada() {
//        return $this->Entrada;
//    }

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
     * @return Usuari
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuari
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuari
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Usuari
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }
    
    
        public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
    
    
}

