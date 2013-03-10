<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Locales
 *
 * @ORM\Table(name="locales")
 * @ORM\Entity
 */
class Locales
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="locales_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato nombre no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para nombre es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para nombre es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=250, nullable=false)
     *
     * @Assert\NotNull(message="El dato direccion no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para direccion es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para direccion es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="establecimiento", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato establecimiento no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para establecimiento debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de establecimiento.")
     */
    private $establecimiento;

    /**
     * @var \Ciudades
     *
     * @ORM\ManyToOne(targetEntity="Ciudades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")
     * })
     */
    private $ciudad;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Locales
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Locales
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set establecimiento
     *
     * @param integer $establecimiento
     * @return Locales
     */
    public function setEstablecimiento($establecimiento)
    {
        $this->establecimiento = $establecimiento;
    
        return $this;
    }

    /**
     * Get establecimiento
     *
     * @return integer 
     */
    public function getEstablecimiento()
    {
        return $this->establecimiento;
    }

    /**
     * Set ciudad
     *
     * @param \MejorPromo\BackendBundle\Entity\Ciudades $ciudad
     * @return Locales
     */
    public function setCiudad(\MejorPromo\BackendBundle\Entity\Ciudades $ciudad = null)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \MejorPromo\BackendBundle\Entity\Ciudades 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }
}