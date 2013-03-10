<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ciudades
 *
 * @ORM\Table(name="ciudades")
 * @ORM\Entity
 */
class Ciudades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ciudades_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=100, nullable=false)
     *
     * @Assert\NotNull(message="El dato ciudad no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para ciudad es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para ciudad es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $ciudad;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ofertas", inversedBy="ciudades")
     * @ORM\JoinTable(name="ofertas_ciudades",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ciudades_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ofertas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $ofertas;

    /**
     * @var \Departamentos
     *
     * @ORM\ManyToOne(targetEntity="Departamentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamentos_id", referencedColumnName="id")
     * })
     */
    private $departamentos;

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
     * Set ciudad
     *
     * @param string $ciudad
     * @return Ciudades
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Ciudades
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
     * Add ofertas
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $ofertas
     * @return Ciudades
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

    /**
     * Set departamentos
     *
     * @param \MejorPromo\BackendBundle\Entity\Departamentos $departamentos
     * @return Ciudades
     */
    public function setDepartamentos(\MejorPromo\BackendBundle\Entity\Departamentos $departamentos = null)
    {
        $this->departamentos = $departamentos;
    
        return $this;
    }

    /**
     * Get departamentos
     *
     * @return \MejorPromo\BackendBundle\Entity\Departamentos 
     */
    public function getDepartamentos()
    {
        return $this->departamentos;
    }
}