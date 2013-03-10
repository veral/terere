<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OfertasIndividuales
 *
 * @ORM\Table(name="ofertas_individuales")
 * @ORM\Entity
 */
class OfertasIndividuales
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ofertas_individuales_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato color no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para color es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para color es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="tamano", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato tamano no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para tamano es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para tamano es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $tamano;

    /**
     * @var string
     *
     * @ORM\Column(name="estilo", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato estilo no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para estilo es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para estilo es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $estilo;

    /**
     * @var float
     *
     * @ORM\Column(name="peso", type="decimal", nullable=true)
     *
     * @Assert\NotNull(message="El dato peso no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para peso debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo peso se admiten hasta 4 decimales y 18 enteros.")
     */
    private $peso;

    /**
     * @var float
     *
     * @ORM\Column(name="largo", type="decimal", nullable=true)
     *
     * @Assert\NotNull(message="El dato largo no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para largo debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo largo se admiten hasta 4 decimales y 18 enteros.")
     */
    private $largo;

    /**
     * @var float
     *
     * @ORM\Column(name="ancho", type="decimal", nullable=true)
     *
     * @Assert\NotNull(message="El dato ancho no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para ancho debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo ancho se admiten hasta 4 decimales y 18 enteros.")
     */
    private $ancho;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad.")
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_maxima_venta", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad_maxima_venta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_maxima_venta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_maxima_venta.")
     */
    private $cantidadMaximaVenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_maxima_regalo", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad_maxima_regalo no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_maxima_regalo debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_maxima_regalo.")
     */
    private $cantidadMaximaRegalo;

    /**
     * @var \Ofertas
     *
     * @ORM\ManyToOne(targetEntity="Ofertas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ofertas_id", referencedColumnName="id")
     * })
     */
    private $ofertas;



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
     * Set color
     *
     * @param string $color
     * @return OfertasIndividuales
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set tamano
     *
     * @param string $tamano
     * @return OfertasIndividuales
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;
    
        return $this;
    }

    /**
     * Get tamano
     *
     * @return string 
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set estilo
     *
     * @param string $estilo
     * @return OfertasIndividuales
     */
    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;
    
        return $this;
    }

    /**
     * Get estilo
     *
     * @return string 
     */
    public function getEstilo()
    {
        return $this->estilo;
    }

    /**
     * Set peso
     *
     * @param float $peso
     * @return OfertasIndividuales
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    
        return $this;
    }

    /**
     * Get peso
     *
     * @return float 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set largo
     *
     * @param float $largo
     * @return OfertasIndividuales
     */
    public function setLargo($largo)
    {
        $this->largo = $largo;
    
        return $this;
    }

    /**
     * Get largo
     *
     * @return float 
     */
    public function getLargo()
    {
        return $this->largo;
    }

    /**
     * Set ancho
     *
     * @param float $ancho
     * @return OfertasIndividuales
     */
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;
    
        return $this;
    }

    /**
     * Get ancho
     *
     * @return float 
     */
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return OfertasIndividuales
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set cantidadMaximaVenta
     *
     * @param integer $cantidadMaximaVenta
     * @return OfertasIndividuales
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
     * @return OfertasIndividuales
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
     * Set ofertas
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $ofertas
     * @return OfertasIndividuales
     */
    public function setOfertas(\MejorPromo\BackendBundle\Entity\Ofertas $ofertas = null)
    {
        $this->ofertas = $ofertas;
    
        return $this;
    }

    /**
     * Get ofertas
     *
     * @return \MejorPromo\BackendBundle\Entity\Ofertas 
     */
    public function getOfertas()
    {
        return $this->ofertas;
    }
}