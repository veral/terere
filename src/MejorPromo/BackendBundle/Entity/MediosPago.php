<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MediosPago
 *
 * @ORM\Table(name="medios_pago")
 * @ORM\Entity
 */
class MediosPago
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="medios_pago_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="medio_pago", type="string", length=100, nullable=false)
     *
     * @Assert\NotNull(message="El dato medio_pago no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para medio_pago es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para medio_pago es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $medioPago;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set medioPago
     *
     * @param string $medioPago
     * @return MediosPago
     */
    public function setMedioPago($medioPago)
    {
        $this->medioPago = $medioPago;
    
        return $this;
    }

    /**
     * Get medioPago
     *
     * @return string 
     */
    public function getMedioPago()
    {
        return $this->medioPago;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return MediosPago
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
     * @return MediosPago
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
}