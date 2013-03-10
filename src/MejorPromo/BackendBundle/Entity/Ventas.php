<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ventas
 *
 * @ORM\Table(name="ventas")
 * @ORM\Entity
 */
class Ventas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ventas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_factura", type="integer", nullable=true)
     *
     * @Assert\NotNull(message="El dato numero_factura no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para numero_factura debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de numero_factura.")
     */
    private $numeroFactura;

    /**
     * @var string
     *
     * @ORM\Column(name="proforma", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato proforma no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para proforma es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para proforma es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $proforma;

    /**
     * @var integer
     *
     * @ORM\Column(name="forma_cobro", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato forma_cobro no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para forma_cobro debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de forma_cobro.")
     */
    private $formaCobro;

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
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var float
     *
     * @ORM\Column(name="total_venta", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato total_venta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para total_venta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo total_venta se admiten hasta 4 decimales y 18 enteros.")
     */
    private $totalVenta;

    /**
     * @var float
     *
     * @ORM\Column(name="total_impuesto", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato total_impuesto no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para total_impuesto debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo total_impuesto se admiten hasta 4 decimales y 18 enteros.")
     */
    private $totalImpuesto;

    /**
     * @var \Talonarios
     *
     * @ORM\ManyToOne(targetEntity="Talonarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="talonario_id", referencedColumnName="id")
     * })
     */
    private $talonario;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;



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
     * Set numeroFactura
     *
     * @param integer $numeroFactura
     * @return Ventas
     */
    public function setNumeroFactura($numeroFactura)
    {
        $this->numeroFactura = $numeroFactura;
    
        return $this;
    }

    /**
     * Get numeroFactura
     *
     * @return integer 
     */
    public function getNumeroFactura()
    {
        return $this->numeroFactura;
    }

    /**
     * Set proforma
     *
     * @param string $proforma
     * @return Ventas
     */
    public function setProforma($proforma)
    {
        $this->proforma = $proforma;
    
        return $this;
    }

    /**
     * Get proforma
     *
     * @return string 
     */
    public function getProforma()
    {
        return $this->proforma;
    }

    /**
     * Set formaCobro
     *
     * @param integer $formaCobro
     * @return Ventas
     */
    public function setFormaCobro($formaCobro)
    {
        $this->formaCobro = $formaCobro;
    
        return $this;
    }

    /**
     * Get formaCobro
     *
     * @return integer 
     */
    public function getFormaCobro()
    {
        return $this->formaCobro;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Ventas
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
     * Set estado
     *
     * @param integer $estado
     * @return Ventas
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
     * Set totalVenta
     *
     * @param float $totalVenta
     * @return Ventas
     */
    public function setTotalVenta($totalVenta)
    {
        $this->totalVenta = $totalVenta;
    
        return $this;
    }

    /**
     * Get totalVenta
     *
     * @return float 
     */
    public function getTotalVenta()
    {
        return $this->totalVenta;
    }

    /**
     * Set totalImpuesto
     *
     * @param float $totalImpuesto
     * @return Ventas
     */
    public function setTotalImpuesto($totalImpuesto)
    {
        $this->totalImpuesto = $totalImpuesto;
    
        return $this;
    }

    /**
     * Get totalImpuesto
     *
     * @return float 
     */
    public function getTotalImpuesto()
    {
        return $this->totalImpuesto;
    }

    /**
     * Set talonario
     *
     * @param \MejorPromo\BackendBundle\Entity\Talonarios $talonario
     * @return Ventas
     */
    public function setTalonario(\MejorPromo\BackendBundle\Entity\Talonarios $talonario = null)
    {
        $this->talonario = $talonario;
    
        return $this;
    }

    /**
     * Get talonario
     *
     * @return \MejorPromo\BackendBundle\Entity\Talonarios 
     */
    public function getTalonario()
    {
        return $this->talonario;
    }

    /**
     * Set usuario
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $usuario
     * @return Ventas
     */
    public function setUsuario(\MejorPromo\BackendBundle\Entity\Usuarios $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}