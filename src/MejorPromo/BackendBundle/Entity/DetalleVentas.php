<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * DetalleVentas
 *
 * @ORM\Table(name="detalle_ventas")
 * @ORM\Entity
 */
class DetalleVentas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="detalle_ventas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_venta", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad_venta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_venta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_venta.")
     */
    private $cantidadVenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_regalo", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad_regalo no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad_regalo debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad_regalo.")
     */
    private $cantidadRegalo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrega", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato fecha_entrega no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_entrega debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaEntrega;

    /**
     * @var integer
     *
     * @ORM\Column(name="ventas_entregadas", type="integer", nullable=true)
     *
     * @Assert\NotNull(message="El dato ventas_entregadas no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para ventas_entregadas debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de ventas_entregadas.")
     */
    private $ventasEntregadas;

    /**
     * @var integer
     *
     * @ORM\Column(name="regalos_entregados", type="integer", nullable=true)
     *
     * @Assert\NotNull(message="El dato regalos_entregados no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para regalos_entregados debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de regalos_entregados.")
     */
    private $regalosEntregados;

    /**
     * @var \OfertasIndividuales
     *
     * @ORM\ManyToOne(targetEntity="OfertasIndividuales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oferta_atributo", referencedColumnName="id")
     * })
     */
    private $ofertaAtributo;

    /**
     * @var \OfertasReservas
     *
     * @ORM\ManyToOne(targetEntity="OfertasReservas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oferta_hora", referencedColumnName="id")
     * })
     */
    private $ofertaHora;

    /**
     * @var \Ofertas
     *
     * @ORM\ManyToOne(targetEntity="Ofertas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oferta", referencedColumnName="id")
     * })
     */
    private $oferta;

    /**
     * @var \Ventas
     *
     * @ORM\ManyToOne(targetEntity="Ventas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="venta", referencedColumnName="id")
     * })
     */
    private $venta;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entregado_por", referencedColumnName="id")
     * })
     */
    private $entregadoPor;



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
     * Set cantidadVenta
     *
     * @param integer $cantidadVenta
     * @return DetalleVentas
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
     * @return DetalleVentas
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
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     * @return DetalleVentas
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    
        return $this;
    }

    /**
     * Get fechaEntrega
     *
     * @return \DateTime 
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set ventasEntregadas
     *
     * @param integer $ventasEntregadas
     * @return DetalleVentas
     */
    public function setVentasEntregadas($ventasEntregadas)
    {
        $this->ventasEntregadas = $ventasEntregadas;
    
        return $this;
    }

    /**
     * Get ventasEntregadas
     *
     * @return integer 
     */
    public function getVentasEntregadas()
    {
        return $this->ventasEntregadas;
    }

    /**
     * Set regalosEntregados
     *
     * @param integer $regalosEntregados
     * @return DetalleVentas
     */
    public function setRegalosEntregados($regalosEntregados)
    {
        $this->regalosEntregados = $regalosEntregados;
    
        return $this;
    }

    /**
     * Get regalosEntregados
     *
     * @return integer 
     */
    public function getRegalosEntregados()
    {
        return $this->regalosEntregados;
    }

    /**
     * Set ofertaAtributo
     *
     * @param \MejorPromo\BackendBundle\Entity\OfertasIndividuales $ofertaAtributo
     * @return DetalleVentas
     */
    public function setOfertaAtributo(\MejorPromo\BackendBundle\Entity\OfertasIndividuales $ofertaAtributo = null)
    {
        $this->ofertaAtributo = $ofertaAtributo;
    
        return $this;
    }

    /**
     * Get ofertaAtributo
     *
     * @return \MejorPromo\BackendBundle\Entity\OfertasIndividuales 
     */
    public function getOfertaAtributo()
    {
        return $this->ofertaAtributo;
    }

    /**
     * Set ofertaHora
     *
     * @param \MejorPromo\BackendBundle\Entity\OfertasReservas $ofertaHora
     * @return DetalleVentas
     */
    public function setOfertaHora(\MejorPromo\BackendBundle\Entity\OfertasReservas $ofertaHora = null)
    {
        $this->ofertaHora = $ofertaHora;
    
        return $this;
    }

    /**
     * Get ofertaHora
     *
     * @return \MejorPromo\BackendBundle\Entity\OfertasReservas 
     */
    public function getOfertaHora()
    {
        return $this->ofertaHora;
    }

    /**
     * Set oferta
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $oferta
     * @return DetalleVentas
     */
    public function setOferta(\MejorPromo\BackendBundle\Entity\Ofertas $oferta = null)
    {
        $this->oferta = $oferta;
    
        return $this;
    }

    /**
     * Get oferta
     *
     * @return \MejorPromo\BackendBundle\Entity\Ofertas 
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set venta
     *
     * @param \MejorPromo\BackendBundle\Entity\Ventas $venta
     * @return DetalleVentas
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

    /**
     * Set entregadoPor
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $entregadoPor
     * @return DetalleVentas
     */
    public function setEntregadoPor(\MejorPromo\BackendBundle\Entity\Usuarios $entregadoPor = null)
    {
        $this->entregadoPor = $entregadoPor;
    
        return $this;
    }

    /**
     * Get entregadoPor
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getEntregadoPor()
    {
        return $this->entregadoPor;
    }
}