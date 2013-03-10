<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tiendas
 *
 * @ORM\Table(name="tiendas")
 * @ORM\Entity
 */
class Tiendas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tiendas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tienda", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato tienda no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para tienda es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para tienda es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $tienda;

    /**
     * @var string
     *
     * @ORM\Column(name="persona_contacto", type="string", length=250, nullable=true)
     *
     * @Assert\NotNull(message="El dato persona_contacto no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para persona_contacto es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para persona_contacto es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $personaContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="linea_baja", type="string", length=250, nullable=true)
     *
     * @Assert\NotNull(message="El dato linea_baja no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para linea_baja es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para linea_baja es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $lineaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="linea_movil", type="string", length=250, nullable=true)
     *
     * @Assert\NotNull(message="El dato linea_movil no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para linea_movil es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para linea_movil es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $lineaMovil;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     *
     * @Assert\NotNull(message="El dato descripcion no puede ser nulo.")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="text", nullable=true)
     *
     * @Assert\NotNull(message="El dato ubicacion no puede ser nulo.")
     */
    private $ubicacion;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud_gmap", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato latitud_gmap no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para latitud_gmap debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo latitud_gmap se admiten hasta 4 decimales y 18 enteros.")
     */
    private $latitudGmap;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud_gmap", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato longitud_gmap no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para longitud_gmap debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo longitud_gmap se admiten hasta 4 decimales y 18 enteros.")
     */
    private $longitudGmap;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=true)
     *
     * @Assert\NotNull(message="El dato foto no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para foto es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=255, message="El texto para foto es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="sitio_web", type="string", length=250, nullable=true)
     *
     * @Assert\NotNull(message="El dato sitio_web no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para sitio_web es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para sitio_web es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $sitioWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato direccion no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para direccion es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para direccion es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ciudad", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato ciudad no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para ciudad debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de ciudad.")
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100, nullable=false)
     *
     * @Assert\NotNull(message="El dato slug no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para slug es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para slug es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_bancaria", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato cuenta_bancaria no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para cuenta_bancaria es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para cuenta_bancaria es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $cuentaBancaria;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_numero", type="string", length=250, nullable=true)
     *
     * @Assert\NotNull(message="El dato cuenta_numero no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para cuenta_numero es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para cuenta_numero es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $cuentaNumero;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorias", mappedBy="tiendas")
     */
    private $categorias;

    /**
     * @var \TiposTienda
     *
     * @ORM\ManyToOne(targetEntity="TiposTienda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_tienda_id", referencedColumnName="id")
     * })
     */
    private $tipoTienda;

    /**
     * @var \EntidadesFinancieras
     *
     * @ORM\ManyToOne(targetEntity="EntidadesFinancieras")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bancos_id", referencedColumnName="id")
     * })
     */
    private $bancos;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarios_id", referencedColumnName="id")
     * })
     */
    private $usuarios;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tienda
     *
     * @param string $tienda
     * @return Tiendas
     */
    public function setTienda($tienda)
    {
        $this->tienda = $tienda;
    
        return $this;
    }

    /**
     * Get tienda
     *
     * @return string 
     */
    public function getTienda()
    {
        return $this->tienda;
    }

    /**
     * Set personaContacto
     *
     * @param string $personaContacto
     * @return Tiendas
     */
    public function setPersonaContacto($personaContacto)
    {
        $this->personaContacto = $personaContacto;
    
        return $this;
    }

    /**
     * Get personaContacto
     *
     * @return string 
     */
    public function getPersonaContacto()
    {
        return $this->personaContacto;
    }

    /**
     * Set lineaBaja
     *
     * @param string $lineaBaja
     * @return Tiendas
     */
    public function setLineaBaja($lineaBaja)
    {
        $this->lineaBaja = $lineaBaja;
    
        return $this;
    }

    /**
     * Get lineaBaja
     *
     * @return string 
     */
    public function getLineaBaja()
    {
        return $this->lineaBaja;
    }

    /**
     * Set lineaMovil
     *
     * @param string $lineaMovil
     * @return Tiendas
     */
    public function setLineaMovil($lineaMovil)
    {
        $this->lineaMovil = $lineaMovil;
    
        return $this;
    }

    /**
     * Get lineaMovil
     *
     * @return string 
     */
    public function getLineaMovil()
    {
        return $this->lineaMovil;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tiendas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Tiendas
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    
        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set latitudGmap
     *
     * @param float $latitudGmap
     * @return Tiendas
     */
    public function setLatitudGmap($latitudGmap)
    {
        $this->latitudGmap = $latitudGmap;
    
        return $this;
    }

    /**
     * Get latitudGmap
     *
     * @return float 
     */
    public function getLatitudGmap()
    {
        return $this->latitudGmap;
    }

    /**
     * Set longitudGmap
     *
     * @param float $longitudGmap
     * @return Tiendas
     */
    public function setLongitudGmap($longitudGmap)
    {
        $this->longitudGmap = $longitudGmap;
    
        return $this;
    }

    /**
     * Get longitudGmap
     *
     * @return float 
     */
    public function getLongitudGmap()
    {
        return $this->longitudGmap;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Tiendas
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

    /**
     * Set sitioWeb
     *
     * @param string $sitioWeb
     * @return Tiendas
     */
    public function setSitioWeb($sitioWeb)
    {
        $this->sitioWeb = $sitioWeb;
    
        return $this;
    }

    /**
     * Get sitioWeb
     *
     * @return string 
     */
    public function getSitioWeb()
    {
        return $this->sitioWeb;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Tiendas
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set ciudad
     *
     * @param integer $ciudad
     * @return Tiendas
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return integer 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Tiendas
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set cuentaBancaria
     *
     * @param string $cuentaBancaria
     * @return Tiendas
     */
    public function setCuentaBancaria($cuentaBancaria)
    {
        $this->cuentaBancaria = $cuentaBancaria;
    
        return $this;
    }

    /**
     * Get cuentaBancaria
     *
     * @return string 
     */
    public function getCuentaBancaria()
    {
        return $this->cuentaBancaria;
    }

    /**
     * Set cuentaNumero
     *
     * @param string $cuentaNumero
     * @return Tiendas
     */
    public function setCuentaNumero($cuentaNumero)
    {
        $this->cuentaNumero = $cuentaNumero;
    
        return $this;
    }

    /**
     * Get cuentaNumero
     *
     * @return string 
     */
    public function getCuentaNumero()
    {
        return $this->cuentaNumero;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Tiendas
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
     * @return Tiendas
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
     * Add categorias
     *
     * @param \MejorPromo\BackendBundle\Entity\Categorias $categorias
     * @return Tiendas
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
     * Set tipoTienda
     *
     * @param \MejorPromo\BackendBundle\Entity\TiposTienda $tipoTienda
     * @return Tiendas
     */
    public function setTipoTienda(\MejorPromo\BackendBundle\Entity\TiposTienda $tipoTienda = null)
    {
        $this->tipoTienda = $tipoTienda;
    
        return $this;
    }

    /**
     * Get tipoTienda
     *
     * @return \MejorPromo\BackendBundle\Entity\TiposTienda 
     */
    public function getTipoTienda()
    {
        return $this->tipoTienda;
    }

    /**
     * Set bancos
     *
     * @param \MejorPromo\BackendBundle\Entity\EntidadesFinancieras $bancos
     * @return Tiendas
     */
    public function setBancos(\MejorPromo\BackendBundle\Entity\EntidadesFinancieras $bancos = null)
    {
        $this->bancos = $bancos;
    
        return $this;
    }

    /**
     * Get bancos
     *
     * @return \MejorPromo\BackendBundle\Entity\EntidadesFinancieras 
     */
    public function getBancos()
    {
        return $this->bancos;
    }

    /**
     * Set usuarios
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $usuarios
     * @return Tiendas
     */
    public function setUsuarios(\MejorPromo\BackendBundle\Entity\Usuarios $usuarios = null)
    {
        $this->usuarios = $usuarios;
    
        return $this;
    }

    /**
     * Get usuarios
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}