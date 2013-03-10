<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ofertas
 *
 * @ORM\Table(name="ofertas")
 * @ORM\Entity
 */
class Ofertas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ofertas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato nombre no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para nombre es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para nombre es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_corto", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato titulo_corto no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para titulo_corto es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para titulo_corto es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $tituloCorto;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato slug no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para slug es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para slug es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="introduccion", type="text", nullable=false)
     *
     * @Assert\NotNull(message="El dato introduccion no puede ser nulo.")
     */
    private $introduccion;

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
     * @ORM\Column(name="condiciones", type="text", nullable=false)
     *
     * @Assert\NotNull(message="El dato condiciones no puede ser nulo.")
     */
    private $condiciones;

    /**
     * @var float
     *
     * @ORM\Column(name="porcentaje_ganancia", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato porcentaje_ganancia no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para porcentaje_ganancia debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo porcentaje_ganancia se admiten hasta 4 decimales y 18 enteros.")
     */
    private $porcentajeGanancia;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_mercado", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato precio_mercado no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para precio_mercado debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo precio_mercado se admiten hasta 4 decimales y 18 enteros.")
     */
    private $precioMercado;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_oferta", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato precio_oferta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para precio_oferta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo precio_oferta se admiten hasta 4 decimales y 18 enteros.")
     */
    private $precioOferta;

    /**
     * @var float
     *
     * @ORM\Column(name="costo_envio", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato costo_envio no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para costo_envio debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo costo_envio se admiten hasta 4 decimales y 18 enteros.")
     */
    private $costoEnvio;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato descuento no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para descuento debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo descuento se admiten hasta 4 decimales y 18 enteros.")
     */
    private $descuento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_publicacion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_publicacion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaPublicacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin_publicacion", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_fin_publicacion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_fin_publicacion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaFinPublicacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_expiracion", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_expiracion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_expiracion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaExpiracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="compras_maximas", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato compras_maximas no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para compras_maximas debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de compras_maximas.")
     */
    private $comprasMaximas;

    /**
     * @var integer
     *
     * @ORM\Column(name="compras_minimas", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato compras_minimas no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para compras_minimas debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de compras_minimas.")
     */
    private $comprasMinimas;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato orden no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para orden debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de orden.")
     */
    private $orden;

    /**
     * @var integer
     *
     * @ORM\Column(name="requiere_reserva", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato requiere_reserva no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para requiere_reserva debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de requiere_reserva.")
     */
    private $requiereReserva;

    /**
     * @var integer
     *
     * @ORM\Column(name="requiere_individualizar", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato requiere_individualizar no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para requiere_individualizar debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de requiere_individualizar.")
     */
    private $requiereIndividualizar;

    /**
     * @var integer
     *
     * @ORM\Column(name="template", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato template no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para template debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de template.")
     */
    private $template;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen_principal", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato imagen_principal no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para imagen_principal es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para imagen_principal es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $imagenPrincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenes", type="text", nullable=true)
     *
     * @Assert\NotNull(message="El dato imagenes no puede ser nulo.")
     */
    private $imagenes;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_maxima_venta", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad_maxima_venta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_maxima_venta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_maxima_venta.")
     */
    private $cantidadMaximaVenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_maxima_regalo", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad_maxima_regalo no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_maxima_regalo debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_maxima_regalo.")
     */
    private $cantidadMaximaRegalo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorias", inversedBy="oferta")
     * @ORM\JoinTable(name="ofertas_categorias",
     *   joinColumns={
     *     @ORM\JoinColumn(name="oferta", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="categoria", referencedColumnName="id")
     *   }
     * )
     */
    private $categoria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ciudades", mappedBy="ofertas")
     */
    private $ciudades;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ModosEntrega", inversedBy="ofertas")
     * @ORM\JoinTable(name="ofertas_modos_entrega",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ofertas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="modos_entrega_id", referencedColumnName="id")
     *   }
     * )
     */
    private $modosEntrega;

    /**
     * @var \Impuestos
     *
     * @ORM\ManyToOne(targetEntity="Impuestos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="impuesto_id", referencedColumnName="id")
     * })
     */
    private $impuesto;

    /**
     * @var \Tiendas
     *
     * @ORM\ManyToOne(targetEntity="Tiendas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tienda_id", referencedColumnName="id")
     * })
     */
    private $tienda;

    /**
     * @var \TiposOfertas
     *
     * @ORM\ManyToOne(targetEntity="TiposOfertas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_oferta_id", referencedColumnName="id")
     * })
     */
    private $tipoOferta;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoria = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ciudades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modosEntrega = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Ofertas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set tituloCorto
     *
     * @param string $tituloCorto
     * @return Ofertas
     */
    public function setTituloCorto($tituloCorto)
    {
        $this->tituloCorto = $tituloCorto;
    
        return $this;
    }

    /**
     * Get tituloCorto
     *
     * @return string 
     */
    public function getTituloCorto()
    {
        return $this->tituloCorto;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Ofertas
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
     * Set introduccion
     *
     * @param string $introduccion
     * @return Ofertas
     */
    public function setIntroduccion($introduccion)
    {
        $this->introduccion = $introduccion;
    
        return $this;
    }

    /**
     * Get introduccion
     *
     * @return string 
     */
    public function getIntroduccion()
    {
        return $this->introduccion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Ofertas
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
     * Set condiciones
     *
     * @param string $condiciones
     * @return Ofertas
     */
    public function setCondiciones($condiciones)
    {
        $this->condiciones = $condiciones;
    
        return $this;
    }

    /**
     * Get condiciones
     *
     * @return string 
     */
    public function getCondiciones()
    {
        return $this->condiciones;
    }

    /**
     * Set porcentajeGanancia
     *
     * @param float $porcentajeGanancia
     * @return Ofertas
     */
    public function setPorcentajeGanancia($porcentajeGanancia)
    {
        $this->porcentajeGanancia = $porcentajeGanancia;
    
        return $this;
    }

    /**
     * Get porcentajeGanancia
     *
     * @return float 
     */
    public function getPorcentajeGanancia()
    {
        return $this->porcentajeGanancia;
    }

    /**
     * Set precioMercado
     *
     * @param float $precioMercado
     * @return Ofertas
     */
    public function setPrecioMercado($precioMercado)
    {
        $this->precioMercado = $precioMercado;
    
        return $this;
    }

    /**
     * Get precioMercado
     *
     * @return float 
     */
    public function getPrecioMercado()
    {
        return $this->precioMercado;
    }

    /**
     * Set precioOferta
     *
     * @param float $precioOferta
     * @return Ofertas
     */
    public function setPrecioOferta($precioOferta)
    {
        $this->precioOferta = $precioOferta;
    
        return $this;
    }

    /**
     * Get precioOferta
     *
     * @return float 
     */
    public function getPrecioOferta()
    {
        return $this->precioOferta;
    }

    /**
     * Set costoEnvio
     *
     * @param float $costoEnvio
     * @return Ofertas
     */
    public function setCostoEnvio($costoEnvio)
    {
        $this->costoEnvio = $costoEnvio;
    
        return $this;
    }

    /**
     * Get costoEnvio
     *
     * @return float 
     */
    public function getCostoEnvio()
    {
        return $this->costoEnvio;
    }

    /**
     * Set descuento
     *
     * @param float $descuento
     * @return Ofertas
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    
        return $this;
    }

    /**
     * Get descuento
     *
     * @return float 
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Ofertas
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    
        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime 
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set fechaFinPublicacion
     *
     * @param \DateTime $fechaFinPublicacion
     * @return Ofertas
     */
    public function setFechaFinPublicacion($fechaFinPublicacion)
    {
        $this->fechaFinPublicacion = $fechaFinPublicacion;
    
        return $this;
    }

    /**
     * Get fechaFinPublicacion
     *
     * @return \DateTime 
     */
    public function getFechaFinPublicacion()
    {
        return $this->fechaFinPublicacion;
    }

    /**
     * Set fechaExpiracion
     *
     * @param \DateTime $fechaExpiracion
     * @return Ofertas
     */
    public function setFechaExpiracion($fechaExpiracion)
    {
        $this->fechaExpiracion = $fechaExpiracion;
    
        return $this;
    }

    /**
     * Get fechaExpiracion
     *
     * @return \DateTime 
     */
    public function getFechaExpiracion()
    {
        return $this->fechaExpiracion;
    }

    /**
     * Set comprasMaximas
     *
     * @param integer $comprasMaximas
     * @return Ofertas
     */
    public function setComprasMaximas($comprasMaximas)
    {
        $this->comprasMaximas = $comprasMaximas;
    
        return $this;
    }

    /**
     * Get comprasMaximas
     *
     * @return integer 
     */
    public function getComprasMaximas()
    {
        return $this->comprasMaximas;
    }

    /**
     * Set comprasMinimas
     *
     * @param integer $comprasMinimas
     * @return Ofertas
     */
    public function setComprasMinimas($comprasMinimas)
    {
        $this->comprasMinimas = $comprasMinimas;
    
        return $this;
    }

    /**
     * Get comprasMinimas
     *
     * @return integer 
     */
    public function getComprasMinimas()
    {
        return $this->comprasMinimas;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Ofertas
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
     * Set orden
     *
     * @param integer $orden
     * @return Ofertas
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    
        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set requiereReserva
     *
     * @param integer $requiereReserva
     * @return Ofertas
     */
    public function setRequiereReserva($requiereReserva)
    {
        $this->requiereReserva = $requiereReserva;
    
        return $this;
    }

    /**
     * Get requiereReserva
     *
     * @return integer 
     */
    public function getRequiereReserva()
    {
        return $this->requiereReserva;
    }

    /**
     * Set requiereIndividualizar
     *
     * @param integer $requiereIndividualizar
     * @return Ofertas
     */
    public function setRequiereIndividualizar($requiereIndividualizar)
    {
        $this->requiereIndividualizar = $requiereIndividualizar;
    
        return $this;
    }

    /**
     * Get requiereIndividualizar
     *
     * @return integer 
     */
    public function getRequiereIndividualizar()
    {
        return $this->requiereIndividualizar;
    }

    /**
     * Set template
     *
     * @param integer $template
     * @return Ofertas
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return integer 
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set imagenPrincipal
     *
     * @param string $imagenPrincipal
     * @return Ofertas
     */
    public function setImagenPrincipal($imagenPrincipal)
    {
        $this->imagenPrincipal = $imagenPrincipal;
    
        return $this;
    }

    /**
     * Get imagenPrincipal
     *
     * @return string 
     */
    public function getImagenPrincipal()
    {
        return $this->imagenPrincipal;
    }

    /**
     * Set imagenes
     *
     * @param string $imagenes
     * @return Ofertas
     */
    public function setImagenes($imagenes)
    {
        $this->imagenes = $imagenes;
    
        return $this;
    }

    /**
     * Get imagenes
     *
     * @return string 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Set cantidadMaximaVenta
     *
     * @param integer $cantidadMaximaVenta
     * @return Ofertas
     */
    public function setCantidadMaximaVenta($cantidadMaximaVenta)
    {
        $this->cantidadMaximaVenta = $cantidadMaximaVenta;
    
        return $this;
    }

    /**
     * Get cantidadMaximaVenta
     *
     * @return integer 
     */
    public function getCantidadMaximaVenta()
    {
        return $this->cantidadMaximaVenta;
    }

    /**
     * Set cantidadMaximaRegalo
     *
     * @param integer $cantidadMaximaRegalo
     * @return Ofertas
     */
    public function setCantidadMaximaRegalo($cantidadMaximaRegalo)
    {
        $this->cantidadMaximaRegalo = $cantidadMaximaRegalo;
    
        return $this;
    }

    /**
     * Get cantidadMaximaRegalo
     *
     * @return integer 
     */
    public function getCantidadMaximaRegalo()
    {
        return $this->cantidadMaximaRegalo;
    }

    /**
     * Add categoria
     *
     * @param \MejorPromo\BackendBundle\Entity\Categorias $categoria
     * @return Ofertas
     */
    public function addCategoria(\MejorPromo\BackendBundle\Entity\Categorias $categoria)
    {
        $this->categoria[] = $categoria;
    
        return $this;
    }

    /**
     * Remove categoria
     *
     * @param \MejorPromo\BackendBundle\Entity\Categorias $categoria
     */
    public function removeCategoria(\MejorPromo\BackendBundle\Entity\Categorias $categoria)
    {
        $this->categoria->removeElement($categoria);
    }

    /**
     * Get categoria
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add ciudades
     *
     * @param \MejorPromo\BackendBundle\Entity\Ciudades $ciudades
     * @return Ofertas
     */
    public function addCiudade(\MejorPromo\BackendBundle\Entity\Ciudades $ciudades)
    {
        $this->ciudades[] = $ciudades;
    
        return $this;
    }

    /**
     * Remove ciudades
     *
     * @param \MejorPromo\BackendBundle\Entity\Ciudades $ciudades
     */
    public function removeCiudade(\MejorPromo\BackendBundle\Entity\Ciudades $ciudades)
    {
        $this->ciudades->removeElement($ciudades);
    }

    /**
     * Get ciudades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }

    /**
     * Add modosEntrega
     *
     * @param \MejorPromo\BackendBundle\Entity\ModosEntrega $modosEntrega
     * @return Ofertas
     */
    public function addModosEntrega(\MejorPromo\BackendBundle\Entity\ModosEntrega $modosEntrega)
    {
        $this->modosEntrega[] = $modosEntrega;
    
        return $this;
    }

    /**
     * Remove modosEntrega
     *
     * @param \MejorPromo\BackendBundle\Entity\ModosEntrega $modosEntrega
     */
    public function removeModosEntrega(\MejorPromo\BackendBundle\Entity\ModosEntrega $modosEntrega)
    {
        $this->modosEntrega->removeElement($modosEntrega);
    }

    /**
     * Get modosEntrega
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModosEntrega()
    {
        return $this->modosEntrega;
    }

    /**
     * Set impuesto
     *
     * @param \MejorPromo\BackendBundle\Entity\Impuestos $impuesto
     * @return Ofertas
     */
    public function setImpuesto(\MejorPromo\BackendBundle\Entity\Impuestos $impuesto = null)
    {
        $this->impuesto = $impuesto;
    
        return $this;
    }

    /**
     * Get impuesto
     *
     * @return \MejorPromo\BackendBundle\Entity\Impuestos 
     */
    public function getImpuesto()
    {
        return $this->impuesto;
    }

    /**
     * Set tienda
     *
     * @param \MejorPromo\BackendBundle\Entity\Tiendas $tienda
     * @return Ofertas
     */
    public function setTienda(\MejorPromo\BackendBundle\Entity\Tiendas $tienda = null)
    {
        $this->tienda = $tienda;
    
        return $this;
    }

    /**
     * Get tienda
     *
     * @return \MejorPromo\BackendBundle\Entity\Tiendas 
     */
    public function getTienda()
    {
        return $this->tienda;
    }

    /**
     * Set tipoOferta
     *
     * @param \MejorPromo\BackendBundle\Entity\TiposOfertas $tipoOferta
     * @return Ofertas
     */
    public function setTipoOferta(\MejorPromo\BackendBundle\Entity\TiposOfertas $tipoOferta = null)
    {
        $this->tipoOferta = $tipoOferta;
    
        return $this;
    }

    /**
     * Get tipoOferta
     *
     * @return \MejorPromo\BackendBundle\Entity\TiposOfertas 
     */
    public function getTipoOferta()
    {
        return $this->tipoOferta;
    }
}