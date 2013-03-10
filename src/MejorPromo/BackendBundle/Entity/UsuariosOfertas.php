<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UsuariosOfertas
 *
 * @ORM\Table(name="usuarios_ofertas")
 * @ORM\Entity
 */
class UsuariosOfertas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuarios_ofertas_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="fecha_marcado", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato fecha_marcado no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_marcado debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaMarcado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_vencimiento no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_vencimiento debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaVencimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_reserva", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato tipo_reserva no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para tipo_reserva debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de tipo_reserva.")
     */
    private $tipoReserva;

    /**
     * @var \Ofertas
     *
     * @ORM\ManyToOne(targetEntity="Ofertas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oferta_id", referencedColumnName="id")
     * })
     */
    private $oferta;

    /**
     * @var \OfertasReservas
     *
     * @ORM\ManyToOne(targetEntity="OfertasReservas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oferta_hora_id", referencedColumnName="id")
     * })
     */
    private $ofertaHora;

    /**
     * @var \OfertasIndividuales
     *
     * @ORM\ManyToOne(targetEntity="OfertasIndividuales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oferta_atributo_id", referencedColumnName="id")
     * })
     */
    private $ofertaAtributo;

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
     * Set cantidadVenta
     *
     * @param integer $cantidadVenta
     * @return UsuariosOfertas
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
     * @return UsuariosOfertas
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
     * Set fechaMarcado
     *
     * @param \DateTime $fechaMarcado
     * @return UsuariosOfertas
     */
    public function setFechaMarcado($fechaMarcado)
    {
        $this->fechaMarcado = $fechaMarcado;
    
        return $this;
    }

    /**
     * Get fechaMarcado
     *
     * @return \DateTime 
     */
    public function getFechaMarcado()
    {
        return $this->fechaMarcado;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return UsuariosOfertas
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    
        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set tipoReserva
     *
     * @param integer $tipoReserva
     * @return UsuariosOfertas
     */
    public function setTipoReserva($tipoReserva)
    {
        $this->tipoReserva = $tipoReserva;
    
        return $this;
    }

    /**
     * Get tipoReserva
     *
     * @return integer 
     */
    public function getTipoReserva()
    {
        return $this->tipoReserva;
    }

    /**
     * Set oferta
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $oferta
     * @return UsuariosOfertas
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
     * Set ofertaHora
     *
     * @param \MejorPromo\BackendBundle\Entity\OfertasReservas $ofertaHora
     * @return UsuariosOfertas
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
     * Set ofertaAtributo
     *
     * @param \MejorPromo\BackendBundle\Entity\OfertasIndividuales $ofertaAtributo
     * @return UsuariosOfertas
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
     * Set usuario
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $usuario
     * @return UsuariosOfertas
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