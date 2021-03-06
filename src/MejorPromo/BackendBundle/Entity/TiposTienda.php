<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TiposTienda
 *
 * @ORM\Table(name="tipos_tienda")
 * @ORM\Entity
 */
class TiposTienda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipos_tienda_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_tienda", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato tipo_tienda no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para tipo_tienda es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para tipo_tienda es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $tipoTienda;



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
     * Set tipoTienda
     *
     * @param string $tipoTienda
     * @return TiposTienda
     */
    public function setTipoTienda($tipoTienda)
    {
        $this->tipoTienda = $tipoTienda;
    
        return $this;
    }

    /**
     * Get tipoTienda
     *
     * @return string 
     */
    public function getTipoTienda()
    {
        return $this->tipoTienda;
    }
}