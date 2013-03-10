<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EntregaDetalleVenta
 *
 * @ORM\Table(name="entrega_detalle_venta")
 * @ORM\Entity
 */
class EntregaDetalleVenta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="entrega_detalle_venta_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato usuario_id no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para usuario_id debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de usuario_id.")
     */
    private $usuarioId;

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
     * @ORM\Column(name="cantidad_venta", type="integer", nullable=true)
     *
     * @Assert\NotNull(message="El dato cantidad_venta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_venta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_venta.")
     */
    private $cantidadVenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_regalo", type="integer", nullable=true)
     *
     * @Assert\NotNull(message="El dato cantidad_regalo no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_regalo debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_regalo.")
     */
    private $cantidadRegalo;

    /**
     * @var \DetalleVentas
     *
     * @ORM\ManyToOne(targetEntity="DetalleVentas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="detalle_venta_id", referencedColumnName="id")
     * })
     */
    private $detalleVenta;



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
     * Set usuarioId
     *
     * @param integer $usuarioId
     * @return EntregaDetalleVenta
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    
        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return integer 
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return EntregaDetalleVenta
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
     * Set cantidadVenta
     *
     * @param integer $cantidadVenta
     * @return EntregaDetalleVenta
     */
    public function setCantidadVenta($cantidadVenta)
    {
        $this->cantidadVenta = $cantidadVenta;
    
        return $this;
    }

    /**
     * Get cantidadVenta
     *
     * @return integer 
     */
    public function getCantidadVenta()
    {
        return $this->cantidadVenta;
    }

    /**
     * Set cantidadRegalo
     *
     * @param integer $cantidadRegalo
     * @return EntregaDetalleVenta
     */
    public function setCantidadRegalo($cantidadRegalo)
    {
        $this->cantidadRegalo = $cantidadRegalo;
    
        return $this;
    }

    /**
     * Get cantidadRegalo
     *
     * @return integer 
     */
    public function getCantidadRegalo()
    {
        return $this->cantidadRegalo;
    }

    /**
     * Set detalleVenta
     *
     * @param \MejorPromo\BackendBundle\Entity\DetalleVentas $detalleVenta
     * @return EntregaDetalleVenta
     */
    public function setDetalleVenta(\MejorPromo\BackendBundle\Entity\DetalleVentas $detalleVenta = null)
    {
        $this->detalleVenta = $detalleVenta;
    
        return $this;
    }

    /**
     * Get detalleVenta
     *
     * @return \MejorPromo\BackendBundle\Entity\DetalleVentas 
     */
    public function getDetalleVenta()
    {
        return $this->detalleVenta;
    }
}