<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Departamentos
 *
 * @ORM\Table(name="departamentos")
 * @ORM\Entity
 */
class Departamentos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="departamentos_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="departamento", type="string", length=100, nullable=false)
     *
     * @Assert\NotNull(message="El dato departamento no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para departamento es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para departamento es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100, nullable=false)
     *
     * @Assert\NotNull(message="El dato slug no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para slug es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para slug es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $slug;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paises_id", referencedColumnName="id")
     * })
     */
    private $paises;



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
     * Set departamento
     *
     * @param string $departamento
     * @return Departamentos
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    
        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Departamentos
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set paises
     *
     * @param \MejorPromo\BackendBundle\Entity\Paises $paises
     * @return Departamentos
     */
    public function setPaises(\MejorPromo\BackendBundle\Entity\Paises $paises = null)
    {
        $this->paises = $paises;
    
        return $this;
    }

    /**
     * Get paises
     *
     * @return \MejorPromo\BackendBundle\Entity\Paises 
     */
    public function getPaises()
    {
        return $this->paises;
    }
}