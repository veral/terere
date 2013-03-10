<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OfertasReservas
 *
 * @ORM\Table(name="ofertas_reservas")
 * @ORM\Entity
 */
class OfertasReservas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ofertas_reservas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_utilizacion", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_utilizacion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_utilizacion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaUtilizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin_utilizacion", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_fin_utilizacion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_fin_utilizacion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaFinUtilizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_utilizacion", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato hora_utilizacion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para hora_utilizacion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $horaUtilizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_fin_utilizacion", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato hora_fin_utilizacion no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para hora_fin_utilizacion debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $horaFinUtilizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato cantidad no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para cantidad debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de cantidad.")
     */
    private $cantidad;

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
     * Set fechaUtilizacion
     *
     * @param \DateTime $fechaUtilizacion
     * @return OfertasReservas
     */
    public function setFechaUtilizacion($fechaUtilizacion)
    {
        $this->fechaUtilizacion = $fechaUtilizacion;
    
        return $this;
    }

    /**
     * Get fechaUtilizacion
     *
     * @return \DateTime 
     */
    public function getFechaUtilizacion()
    {
        return $this->fechaUtilizacion;
    }

    /**
     * Set fechaFinUtilizacion
     *
     * @param \DateTime $fechaFinUtilizacion
     * @return OfertasReservas
     */
    public function setFechaFinUtilizacion($fechaFinUtilizacion)
    {
        $this->fechaFinUtilizacion = $fechaFinUtilizacion;
    
        return $this;
    }

    /**
     * Get fechaFinUtilizacion
     *
     * @return \DateTime 
     */
    public function getFechaFinUtilizacion()
    {
        return $this->fechaFinUtilizacion;
    }

    /**
     * Set horaUtilizacion
     *
     * @param \DateTime $horaUtilizacion
     * @return OfertasReservas
     */
    public function setHoraUtilizacion($horaUtilizacion)
    {
        $this->horaUtilizacion = $horaUtilizacion;
    
        return $this;
    }

    /**
     * Get horaUtilizacion
     *
     * @return \DateTime 
     */
    public function getHoraUtilizacion()
    {
        return $this->horaUtilizacion;
    }

    /**
     * Set horaFinUtilizacion
     *
     * @param \DateTime $horaFinUtilizacion
     * @return OfertasReservas
     */
    public function setHoraFinUtilizacion($horaFinUtilizacion)
    {
        $this->horaFinUtilizacion = $horaFinUtilizacion;
    
        return $this;
    }

    /**
     * Get horaFinUtilizacion
     *
     * @return \DateTime 
     */
    public function getHoraFinUtilizacion()
    {
        return $this->horaFinUtilizacion;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return OfertasReservas
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
     * @return OfertasReservas
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
     * @return OfertasReservas
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
     * @return OfertasReservas
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