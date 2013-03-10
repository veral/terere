<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cajas
 *
 * @ORM\Table(name="cajas")
 * @ORM\Entity
 */
class Cajas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cajas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="punto_expedicion", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato punto_expedicion no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para punto_expedicion debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de punto_expedicion.")
     */
    private $puntoExpedicion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var \Locales
     *
     * @ORM\ManyToOne(targetEntity="Locales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="local_id", referencedColumnName="id")
     * })
     */
    private $local;



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
     * Set puntoExpedicion
     *
     * @param integer $puntoExpedicion
     * @return Cajas
     */
    public function setPuntoExpedicion($puntoExpedicion)
    {
        $this->puntoExpedicion = $puntoExpedicion;
    
        return $this;
    }

    /**
     * Get puntoExpedicion
     *
     * @return integer 
     */
    public function getPuntoExpedicion()
    {
        return $this->puntoExpedicion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Cajas
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
     * Set local
     *
     * @param \MejorPromo\BackendBundle\Entity\Locales $local
     * @return Cajas
     */
    public function setLocal(\MejorPromo\BackendBundle\Entity\Locales $local = null)
    {
        $this->local = $local;
    
        return $this;
    }

    /**
     * Get local
     *
     * @return \MejorPromo\BackendBundle\Entity\Locales 
     */
    public function getLocal()
    {
        return $this->local;
    }

    public function __toString(){
        return (string) $this->getPuntoExpedicion();
    }
}