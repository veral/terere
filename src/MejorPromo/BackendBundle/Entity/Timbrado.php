<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Timbrado
 *
 * @ORM\Table(name="timbrado")
 * @ORM\Entity
 */
class Timbrado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="timbrado_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato codigo no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para codigo debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de codigo.")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="imprenta", type="string", length=250, nullable=false)
     *
     * @Assert\NotNull(message="El dato imprenta no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para imprenta es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=250, message="El texto para imprenta es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $imprenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_vigencia", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_inicio_vigencia no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_inicio_vigencia debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaInicioVigencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin_vigencia", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="El dato fecha_fin_vigencia no puede ser nulo.")
     * @Assert\DateTime(message = "El valor para fecha_fin_vigencia debe ser una fecha valida con el formato: dd/mm/YYYY.")
     */
    private $fechaFinVigencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="inicio_secuencia", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato inicio_secuencia no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para inicio_secuencia debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de inicio_secuencia.")
     */
    private $inicioSecuencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="fin_secuencia", type="integer", nullable=false)
     *
     * @Assert\NotNull(message="El dato fin_secuencia no puede ser nulo.")
     * @Assert\Min(limit = 1, message = "El valor para fin_secuencia debe ser mayor a {{ limit }}, ingrese un valor mayor.")
     * @Assert\Regex(pattern="/^\w+/", match=true, message = "Sólo se admiten números positivos para el valor de fin_secuencia.")
     */
    private $finSecuencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
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
     * Set codigo
     *
     * @param integer $codigo
     * @return Timbrado
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set imprenta
     *
     * @param string $imprenta
     * @return Timbrado
     */
    public function setImprenta($imprenta)
    {
        $this->imprenta = $imprenta;
    
        return $this;
    }

    /**
     * Get imprenta
     *
     * @return string 
     */
    public function getImprenta()
    {
        return $this->imprenta;
    }

    /**
     * Set fechaInicioVigencia
     *
     * @param \DateTime $fechaInicioVigencia
     * @return Timbrado
     */
    public function setFechaInicioVigencia($fechaInicioVigencia)
    {
        $this->fechaInicioVigencia = $fechaInicioVigencia;
    
        return $this;
    }

    /**
     * Get fechaInicioVigencia
     *
     * @return \DateTime 
     */
    public function getFechaInicioVigencia()
    {
        return $this->fechaInicioVigencia;
    }

    /**
     * Set fechaFinVigencia
     *
     * @param \DateTime $fechaFinVigencia
     * @return Timbrado
     */
    public function setFechaFinVigencia($fechaFinVigencia)
    {
        $this->fechaFinVigencia = $fechaFinVigencia;
    
        return $this;
    }

    /**
     * Get fechaFinVigencia
     *
     * @return \DateTime 
     */
    public function getFechaFinVigencia()
    {
        return $this->fechaFinVigencia;
    }

    /**
     * Set inicioSecuencia
     *
     * @param integer $inicioSecuencia
     * @return Timbrado
     */
    public function setInicioSecuencia($inicioSecuencia)
    {
        $this->inicioSecuencia = $inicioSecuencia;
    
        return $this;
    }

    /**
     * Get inicioSecuencia
     *
     * @return integer 
     */
    public function getInicioSecuencia()
    {
        return $this->inicioSecuencia;
    }

    /**
     * Set finSecuencia
     *
     * @param integer $finSecuencia
     * @return Timbrado
     */
    public function setFinSecuencia($finSecuencia)
    {
        $this->finSecuencia = $finSecuencia;
    
        return $this;
    }

    /**
     * Get finSecuencia
     *
     * @return integer 
     */
    public function getFinSecuencia()
    {
        return $this->finSecuencia;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Timbrado
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