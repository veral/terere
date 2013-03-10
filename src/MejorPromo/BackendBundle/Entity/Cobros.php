<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cobros
 *
 * @ORM\Table(name="cobros")
 * @ORM\Entity
 */
class Cobros
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cobros_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="total_cobrado", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato total_cobrado no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para total_cobrado debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo total_cobrado se admiten hasta 4 decimales y 18 enteros.")
     */
    private $totalCobrado;

    /**
     * @var string
     *
     * @ORM\Column(name="factura", type="string", length=20, nullable=false)
     *
     * @Assert\NotNull(message="El dato factura no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para factura es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=20, message="El texto para factura es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $factura;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var \CajasAperturas
     *
     * @ORM\ManyToOne(targetEntity="CajasAperturas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="apertura_id", referencedColumnName="id")
     * })
     */
    private $apertura;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cajero_id", referencedColumnName="id")
     * })
     */
    private $cajero;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cobrador_id", referencedColumnName="id")
     * })
     */
    private $cobrador;

    /**
     * @var \Monedas
     *
     * @ORM\ManyToOne(targetEntity="Monedas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="moneda_id", referencedColumnName="id")
     * })
     */
    private $moneda;

    /**
     * @var \Ventas
     *
     * @ORM\ManyToOne(targetEntity="Ventas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="venta_id", referencedColumnName="id")
     * })
     */
    private $venta;



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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Cobros
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set totalCobrado
     *
     * @param float $totalCobrado
     * @return Cobros
     */
    public function setTotalCobrado($totalCobrado)
    {
        $this->totalCobrado = $totalCobrado;
    
        return $this;
    }

    /**
     * Get totalCobrado
     *
     * @return float 
     */
    public function getTotalCobrado()
    {
        return $this->totalCobrado;
    }

    /**
     * Set factura
     *
     * @param string $factura
     * @return Cobros
     */
    public function setFactura($factura)
    {
        $this->factura = $factura;
    
        return $this;
    }

    /**
     * Get factura
     *
     * @return string 
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Cobros
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
     * Set apertura
     *
     * @param \MejorPromo\BackendBundle\Entity\CajasAperturas $apertura
     * @return Cobros
     */
    public function setApertura(\MejorPromo\BackendBundle\Entity\CajasAperturas $apertura = null)
    {
        $this->apertura = $apertura;
    
        return $this;
    }

    /**
     * Get apertura
     *
     * @return \MejorPromo\BackendBundle\Entity\CajasAperturas 
     */
    public function getApertura()
    {
        return $this->apertura;
    }

    /**
     * Set cajero
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $cajero
     * @return Cobros
     */
    public function setCajero(\MejorPromo\BackendBundle\Entity\Usuarios $cajero = null)
    {
        $this->cajero = $cajero;
    
        return $this;
    }

    /**
     * Get cajero
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getCajero()
    {
        return $this->cajero;
    }

    /**
     * Set cobrador
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $cobrador
     * @return Cobros
     */
    public function setCobrador(\MejorPromo\BackendBundle\Entity\Usuarios $cobrador = null)
    {
        $this->cobrador = $cobrador;
    
        return $this;
    }

    /**
     * Get cobrador
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getCobrador()
    {
        return $this->cobrador;
    }

    /**
     * Set moneda
     *
     * @param \MejorPromo\BackendBundle\Entity\Monedas $moneda
     * @return Cobros
     */
    public function setMoneda(\MejorPromo\BackendBundle\Entity\Monedas $moneda = null)
    {
        $this->moneda = $moneda;
    
        return $this;
    }

    /**
     * Get moneda
     *
     * @return \MejorPromo\BackendBundle\Entity\Monedas 
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set venta
     *
     * @param \MejorPromo\BackendBundle\Entity\Ventas $venta
     * @return Cobros
     */
    public function setVenta(\MejorPromo\BackendBundle\Entity\Ventas $venta = null)
    {
        $this->venta = $venta;
    
        return $this;
    }

    /**
     * Get venta
     *
     * @return \MejorPromo\BackendBundle\Entity\Ventas 
     */
    public function getVenta()
    {
        return $this->venta;
    }
}