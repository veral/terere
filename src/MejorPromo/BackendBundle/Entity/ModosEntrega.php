<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ModosEntrega
 *
 * @ORM\Table(name="modos_entrega")
 * @ORM\Entity
 */
class ModosEntrega
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="modos_entrega_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="modo_entrega", type="string", length=125, nullable=false)
     *
     * @Assert\NotNull(message="El dato modo_entrega no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para modo_entrega es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=125, message="El texto para modo_entrega es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $modoEntrega;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     *
     * @Assert\NotNull(message="El dato descripcion no puede ser nulo.")
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ofertas", mappedBy="modosEntrega")
     */
    private $ofertas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ofertas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set modoEntrega
     *
     * @param string $modoEntrega
     * @return ModosEntrega
     */
    public function setModoEntrega($modoEntrega)
    {
        $this->modoEntrega = $modoEntrega;
    
        return $this;
    }

    /**
     * Get modoEntrega
     *
     * @return string 
     */
    public function getModoEntrega()
    {
        return $this->modoEntrega;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ModosEntrega
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return ModosEntrega
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
     * Add ofertas
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $ofertas
     * @return ModosEntrega
     */
    public function addOferta(\MejorPromo\BackendBundle\Entity\Ofertas $ofertas)
    {
        $this->ofertas[] = $ofertas;
    
        return $this;
    }

    /**
     * Remove ofertas
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $ofertas
     */
    public function removeOferta(\MejorPromo\BackendBundle\Entity\Ofertas $ofertas)
    {
        $this->ofertas->removeElement($ofertas);
    }

    /**
     * Get ofertas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOfertas()
    {
        return $this->ofertas;
    }
}