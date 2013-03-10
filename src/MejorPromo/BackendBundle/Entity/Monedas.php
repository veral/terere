<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Monedas
 *
 * @ORM\Table(name="monedas")
 * @ORM\Entity
 */
class Monedas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="monedas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="moneda", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato moneda no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para moneda es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para moneda es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $moneda;

    /**
     * @var string
     *
     * @ORM\Column(name="abreviatura", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato abreviatura no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para abreviatura es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para abreviatura es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $abreviatura;



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
     * Set moneda
     *
     * @param string $moneda
     * @return Monedas
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
    
        return $this;
    }

    /**
     * Get moneda
     *
     * @return string 
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return Monedas
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    
        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    public function __toString(){
        return (string) $this->getMoneda();
    }
    
}