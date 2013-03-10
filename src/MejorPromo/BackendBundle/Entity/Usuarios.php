<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuarios_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_usuario", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato tipo_usuario no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para tipo_usuario debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de tipo_usuario.")
     */
    private $tipoUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=125, nullable=false)
     *
     * @Assert\NotNull(message="El dato mail no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para mail es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=125, message="El texto para mail es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=250, nullable=false)
     *
     * @Assert\NotNull(message="El dato username no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para username es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para username es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato password no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para password es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para password es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato salt no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para salt es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para salt es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato facebook no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para facebook es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para facebook es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato twitter no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para twitter es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para twitter es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $twitter;

    /**
     * @var integer
     *
     * @ORM\Column(name="permite_email", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato permite_email no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para permite_email debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de permite_email.")
     */
    private $permiteEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_alta no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_alta debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaAlta;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_registro", type="string", length=25, nullable=false)
     *
     * @Assert\NotNull(message="El dato ip_registro no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para ip_registro es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=25, message="El texto para ip_registro es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $ipRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato token no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para token es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para token es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $token;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ultima_conexion", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato ultima_conexion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para ultima_conexion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $ultimaConexion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorias", inversedBy="usuarios")
     * @ORM\JoinTable(name="usuarios_categorias",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuarios_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="categorias_id", referencedColumnName="id")
     *   }
     * )
     */
    private $categorias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Roles", mappedBy="usuarios")
     */
    private $roles;

    /**
     * @var \Personas
     *
     * @ORM\ManyToOne(targetEntity="Personas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personas_id", referencedColumnName="id")
     * })
     */
    private $personas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tipoUsuario
     *
     * @param integer $tipoUsuario
     * @return Usuarios
     */
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    
        return $this;
    }

    /**
     * Get tipoUsuario
     *
     * @return integer 
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Usuarios
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuarios
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuarios
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
     * Set salt
     *
     * @param string $salt
     * @return Usuarios
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Usuarios
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    
        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Usuarios
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    
        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set permiteEmail
     *
     * @param integer $permiteEmail
     * @return Usuarios
     */
    public function setPermiteEmail($permiteEmail)
    {
        $this->permiteEmail = $permiteEmail;
    
        return $this;
    }

    /**
     * Get permiteEmail
     *
     * @return integer 
     */
    public function getPermiteEmail()
    {
        return $this->permiteEmail;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuarios
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    
        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set ipRegistro
     *
     * @param string $ipRegistro
     * @return Usuarios
     */
    public function setIpRegistro($ipRegistro)
    {
        $this->ipRegistro = $ipRegistro;
    
        return $this;
    }

    /**
     * Get ipRegistro
     *
     * @return string 
     */
    public function getIpRegistro()
    {
        return $this->ipRegistro;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Usuarios
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Usuarios
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set ultimaConexion
     *
     * @param \DateTime $ultimaConexion
     * @return Usuarios
     */
    public function setUltimaConexion($ultimaConexion)
    {
        $this->ultimaConexion = $ultimaConexion;
    
        return $this;
    }

    /**
     * Get ultimaConexion
     *
     * @return \DateTime 
     */
    public function getUltimaConexion()
    {
        return $this->ultimaConexion;
    }

    /**
     * Add categorias
     *
     * @param \MejorPromo\BackendBundle\Entity\Categorias $categorias
     * @return Usuarios
     */
    public function addCategoria(\MejorPromo\BackendBundle\Entity\Categorias $categorias)
    {
        $this->categorias[] = $categorias;
    
        return $this;
    }

    /**
     * Remove categorias
     *
     * @param \MejorPromo\BackendBundle\Entity\Categorias $categorias
     */
    public function removeCategoria(\MejorPromo\BackendBundle\Entity\Categorias $categorias)
    {
        $this->categorias->removeElement($categorias);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Add roles
     *
     * @param \MejorPromo\BackendBundle\Entity\Roles $roles
     * @return Usuarios
     */
    public function addRole(\MejorPromo\BackendBundle\Entity\Roles $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \MejorPromo\BackendBundle\Entity\Roles $roles
     */
    public function removeRole(\MejorPromo\BackendBundle\Entity\Roles $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set personas
     *
     * @param \MejorPromo\BackendBundle\Entity\Personas $personas
     * @return Usuarios
     */
    public function setPersonas(\MejorPromo\BackendBundle\Entity\Personas $personas = null)
    {
        $this->personas = $personas;
    
        return $this;
    }

    /**
     * Get personas
     *
     * @return \MejorPromo\BackendBundle\Entity\Personas 
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    public function __toString(){
        return (string) $this->getUsername();
    }
}