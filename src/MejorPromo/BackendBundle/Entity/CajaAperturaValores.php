<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CajaAperturaValores
 *
 * @ORM\Table(name="caja_apertura_valores")
 * @ORM\Entity
 */
class CajaAperturaValores
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="caja_apertura_valores_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="monto", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato monto no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para monto debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo monto se admiten hasta 4 decimales y 18 enteros.")
     */
    private $monto;

    /**
     * @var float
     *
     * @ORM\Column(name="cotizacion", type="decimal", nullable=true)
     *
     * @Assert\NotNull(message="El dato cotizacion no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cotizacion debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo cotizacion se admiten hasta 4 decimales y 18 enteros.")
     */
    private $cotizacion;

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
     * @var \CajasAperturas
     *
     * @ORM\ManyToOne(targetEntity="CajasAperturas", inversedBy="cajaAperturaValores", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="caja_apertura_id", referencedColumnName="id")
     * })
     */
    private $cajaApertura;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set monto
     *
     * @param float $monto
     * @return CajaAperturaValores
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    
        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set cotizacion
     *
     * @param float $cotizacion
     * @return CajaAperturaValores
     */
    public function setCotizacion($cotizacion)
    {
        $this->cotizacion = $cotizacion;
    
        return $this;
    }

    /**
     * Get cotizacion
     *
     * @return float 
     */
    public function getCotizacion()
    {
        return $this->cotizacion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return CajaAperturaValores
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
     * Set cajaApertura
     *
     * @param \MejorPromo\BackendBundle\Entity\CajasAperturas $cajaApertura
     * @return CajaAperturaValores
     */
    public function setCajaApertura(\MejorPromo\BackendBundle\Entity\CajasAperturas $cajaApertura = null)
    {
        $this->cajaApertura = $cajaApertura;
    
        return $this;
    }

    /**
     * Get cajaApertura
     *
     * @return \MejorPromo\BackendBundle\Entity\CajasAperturas 
     */
    public function getCajaApertura()
    {
        return $this->cajaApertura;
    }

    /**
     * Set moneda
     *
     * @param \MejorPromo\BackendBundle\Entity\Monedas $moneda
     * @return CajaAperturaValores
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
}