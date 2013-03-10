<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CobrosValores
 *
 * @ORM\Table(name="cobros_valores")
 * @ORM\Entity
 */
class CobrosValores
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cobros_valores_id_seq", allocationSize=1, initialValue=1)
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
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=20, nullable=true)
     *
     * @Assert\NotNull(message="El dato documento no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para documento es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=20, message="El texto para documento es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $documento;

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
     * @var \MediosPago
     *
     * @ORM\ManyToOne(targetEntity="MediosPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medio_pago_id", referencedColumnName="id")
     * })
     */
    private $medioPago;

    /**
     * @var \Cobros
     *
     * @ORM\ManyToOne(targetEntity="Cobros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cobro_id", referencedColumnName="id")
     * })
     */
    private $cobro;

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
     * @var \EntidadesFinancieras
     *
     * @ORM\ManyToOne(targetEntity="EntidadesFinancieras")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="banco_id", referencedColumnName="id")
     * })
     */
    private $banco;



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
     * @return CobrosValores
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
     * @return CobrosValores
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
     * Set documento
     *
     * @param string $documento
     * @return CobrosValores
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    
        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return CobrosValores
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
     * Set medioPago
     *
     * @param \MejorPromo\BackendBundle\Entity\MediosPago $medioPago
     * @return CobrosValores
     */
    public function setMedioPago(\MejorPromo\BackendBundle\Entity\MediosPago $medioPago = null)
    {
        $this->medioPago = $medioPago;
    
        return $this;
    }

    /**
     * Get medioPago
     *
     * @return \MejorPromo\BackendBundle\Entity\MediosPago 
     */
    public function getMedioPago()
    {
        return $this->medioPago;
    }

    /**
     * Set cobro
     *
     * @param \MejorPromo\BackendBundle\Entity\Cobros $cobro
     * @return CobrosValores
     */
    public function setCobro(\MejorPromo\BackendBundle\Entity\Cobros $cobro = null)
    {
        $this->cobro = $cobro;
    
        return $this;
    }

    /**
     * Get cobro
     *
     * @return \MejorPromo\BackendBundle\Entity\Cobros 
     */
    public function getCobro()
    {
        return $this->cobro;
    }

    /**
     * Set moneda
     *
     * @param \MejorPromo\BackendBundle\Entity\Monedas $moneda
     * @return CobrosValores
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
     * Set banco
     *
     * @param \MejorPromo\BackendBundle\Entity\EntidadesFinancieras $banco
     * @return CobrosValores
     */
    public function setBanco(\MejorPromo\BackendBundle\Entity\EntidadesFinancieras $banco = null)
    {
        $this->banco = $banco;
    
        return $this;
    }

    /**
     * Get banco
     *
     * @return \MejorPromo\BackendBundle\Entity\EntidadesFinancieras 
     */
    public function getBanco()
    {
        return $this->banco;
    }
}