<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Personas
 *
 * @ORM\Table(name="personas")
 * @ORM\Entity
 */
class Personas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="personas_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_persona", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato tipo_persona no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para tipo_persona debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de tipo_persona.")
     */
    private $tipoPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=100, nullable=true)
     *
     * @Assert\NotNull(message="El dato nombres no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para nombres es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para nombres es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=true)
     *
     * @Assert\NotNull(message="El dato apellidos no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para apellidos es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para apellidos es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion", type="string", length=100, nullable=true)
     *
     * @Assert\NotNull(message="El dato denominacion no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para denominacion es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=100, message="El texto para denominacion es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $denominacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_documento", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato tipo_documento no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para tipo_documento debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de tipo_documento.")
     */
    private $tipoDocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=20, nullable=false)
     *
     * @Assert\NotNull(message="El dato documento no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para documento es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=20, message="El texto para documento es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
     *
     * @Assert\NotNull(message="El dato sexo no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para sexo es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=1, message="El texto para sexo es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato fecha_nacimiento no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_nacimiento debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaNacimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="nacionalidad", type="smallint", nullable=true)
     *
     * @Assert\NotNull(message="El dato nacionalidad no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para nacionalidad debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de nacionalidad.")
     */
    private $nacionalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=128, nullable=true)
     *
     * @Assert\NotNull(message="El dato direccion no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para direccion es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=128, message="El texto para direccion es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     *
     * @Assert\NotNull(message="El dato telefono no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para telefono es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=20, message="El texto para telefono es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $telefono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=true)
     *
     * @Assert\NotNull(message="El dato fecha_alta no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_alta debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaAlta;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=true)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="tarjeta_de_credito", type="string", length=150, nullable=true)
     *
     * @Assert\NotNull(message="El dato tarjeta_de_credito no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para tarjeta_de_credito es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para tarjeta_de_credito es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $tarjetaDeCredito;

    /**
     * @var \Ciudades
     *
     * @ORM\ManyToOne(targetEntity="Ciudades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ciudad", referencedColumnName="id")
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
     * Set tipoPersona
     *
     * @param integer $tipoPersona
     * @return Personas
     */
    public function setTipoPersona($tipoPersona)
    {
        $this->tipoPersona = $tipoPersona;
    
        return $this;
    }

    /**
     * Get tipoPersona
     *
     * @return integer 
     */
    public function getTipoPersona()
    {
        return $this->tipoPersona;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Personas
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Personas
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     * @return Personas
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    
        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set tipoDocumento
     *
     * @param integer $tipoDocumento
     * @return Personas
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    
        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return integer 
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set documento
     *
     * @param string $documento
     * @return Personas
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    
        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Personas
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Personas
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set nacionalidad
     *
     * @param integer $nacionalidad
     * @return Personas
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    
        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return integer 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Personas
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
     * Set telefono
     *
     * @param string $telefono
     * @return Personas
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Personas
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    
        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Personas
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
     * Set tarjetaDeCredito
     *
     * @param string $tarjetaDeCredito
     * @return Personas
     */
    public function setTarjetaDeCredito($tarjetaDeCredito)
    {
        $this->tarjetaDeCredito = $tarjetaDeCredito;
    
        return $this;
    }

    /**
     * Get tarjetaDeCredito
     *
     * @return string 
     */
    public function getTarjetaDeCredito()
    {
        return $this->tarjetaDeCredito;
    }

    /**
     * Set ciudad
     *
     * @param \MejorPromo\BackendBundle\Entity\Ciudades $ciudad
     * @return Personas
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