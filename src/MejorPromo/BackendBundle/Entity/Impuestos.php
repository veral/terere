<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Impuestos
 *
 * @ORM\Table(name="impuestos")
 * @ORM\Entity
 */
class Impuestos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="impuestos_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="impuesto", type="string", length=50, nullable=false)
     *
     * @Assert\NotNull(message="El dato impuesto no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para impuesto es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=50, message="El texto para impuesto es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $impuesto;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="decimal", nullable=false)
     *
     * @Assert\NotNull(message="El dato valor no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para valor debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="^\d{1,18}(\.\d{1,4})?$", match=true, message = "Para el campo valor se admiten hasta 4 decimales y 18 enteros.")
     */
    private $valor;



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
     * Set impuesto
     *
     * @param string $impuesto
     * @return Impuestos
     */
    public function setImpuesto($impuesto)
    {
        $this->impuesto = $impuesto;
    
        return $this;
    }

    /**
     * Get impuesto
     *
     * @return string 
     */
    public function getImpuesto()
    {
        return $this->impuesto;
    }

    /**
     * Set valor
     *
     * @param float $valor
     * @return Impuestos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }
}