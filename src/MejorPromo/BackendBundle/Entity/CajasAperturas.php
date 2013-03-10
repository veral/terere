<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CajasAperturas
 *
 * @ORM\Table(name="cajas_aperturas")
 * @ORM\Entity
 */
class CajasAperturas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cajas_aperturas_id_seq", allocationSize=1, initialValue=1)
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
     * @var \DateTime
     *
     * @ORM\Column(name="hora_cierre", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato hora_cierre no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para hora_cierre debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $horaCierre;

    /**
     * @var integer
     *
     * @ORM\Column(name="abierta", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato abierta no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para abierta debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de abierta.")
     */
    private $abierta;

    /**
     * @var \Cajas
     *
     * @ORM\ManyToOne(targetEntity="Cajas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="caja_id", referencedColumnName="id")
     * })
     */
    private $caja;

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
     *   @ORM\JoinColumn(name="entrego_id", referencedColumnName="id")
     * })
     */
    private $entrego;

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recibio_id", referencedColumnName="id")
     * })
     */
    private $recibio;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="CajaAperturaValores", mappedBy="cajaApertura", cascade={"all"}, orphanRemoval=true)
     * @Assert\Valid()
     */
    public $cajaAperturaValores;


    public function __construct()
    {
        $this->cajaAperturaValores = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return CajasAperturas
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
     * Set horaCierre
     *
     * @param \DateTime $horaCierre
     * @return CajasAperturas
     */
    public function setHoraCierre($horaCierre)
    {
        $this->horaCierre = $horaCierre;
    
        return $this;
    }

    /**
     * Get horaCierre
     *
     * @return \DateTime 
     */
    public function getHoraCierre()
    {
        return $this->horaCierre;
    }

    /**
     * Set abierta
     *
     * @param integer $abierta
     * @return CajasAperturas
     */
    public function setAbierta($abierta)
    {
        $this->abierta = $abierta;
    
        return $this;
    }

    /**
     * Get abierta
     *
     * @return integer 
     */
    public function getAbierta()
    {
        return $this->abierta;
    }

    /**
     * Set caja
     *
     * @param \MejorPromo\BackendBundle\Entity\Cajas $caja
     * @return CajasAperturas
     */
    public function setCaja(\MejorPromo\BackendBundle\Entity\Cajas $caja = null)
    {
        $this->caja = $caja;
    
        return $this;
    }

    /**
     * Get caja
     *
     * @return \MejorPromo\BackendBundle\Entity\Cajas 
     */
    public function getCaja()
    {
        return $this->caja;
    }

    /**
     * Set cajero
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $cajero
     * @return CajasAperturas
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
     * Set entrego
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $entrego
     * @return CajasAperturas
     */
    public function setEntrego(\MejorPromo\BackendBundle\Entity\Usuarios $entrego = null)
    {
        $this->entrego = $entrego;
    
        return $this;
    }

    /**
     * Get entrego
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getEntrego()
    {
        return $this->entrego;
    }

    /**
     * Set recibio
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $recibio
     * @return CajasAperturas
     */
    public function setRecibio(\MejorPromo\BackendBundle\Entity\Usuarios $recibio = null)
    {
        $this->recibio = $recibio;
    
        return $this;
    }

    /**
     * Get recibio
     *
     * @return \MejorPromo\BackendBundle\Entity\Usuarios 
     */
    public function getRecibio()
    {
        return $this->recibio;
    }

    /**
     * Add cajaAperturaValores
     *
     * @param MejorPromo\BackendBundle\Entity\CajaAperturaValores $cajaAperturaValores
     */
    public function addCajaAperturaValores(\MejorPromo\BackendBundle\Entity\CajaAperturaValores $cajaAperturaValores)
    {
        $this->cajaAperturaValores[] = $cajaAperturaValores;
        $cajaAperturaValores->setCajaApertura($this);
    }

    /**
     * Remove cajaAperturaValores
     *
     * @param MejorPromo\BackendBundle\Entity\CajaAperturaValores $cajaAperturaValores
     */
    public function removeCajaAperturaValores(\MejorPromo\BackendBundle\Entity\CajaAperturaValores $cajaAperturaValores)
    {
        $this->cajaAperturaValores->removeElement($cajaAperturaValores);
    }

    /**
     * Set cajaAperturaValores
     * 
     */
    public function setCajaAperturaValores($cajaAperturaValores)
    {
        $this->cajaAperturaValores = $cajaAperturaValores;

        foreach ($cajaAperturaValores as $valor) {
            $valor->setCajaApertura($this);
        }
    }

    /**
     * Get cajaAperturaValores
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCajaAperturaValores()
    {
        return $this->cajaAperturaValores;
    }

    public function __toString(){
        return 'Apertura de Cajas';
    }
}