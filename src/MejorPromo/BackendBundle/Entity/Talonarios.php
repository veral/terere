<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Talonarios
 *
 * @ORM\Table(name="talonarios")
 * @ORM\Entity
 */
class Talonarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="talonarios_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

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
     * @var \Cajas
     *
     * @ORM\ManyToOne(targetEntity="Cajas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="caja_id", referencedColumnName="id")
     * })
     */
    private $caja;

    /**
     * @var \Timbrado
     *
     * @ORM\ManyToOne(targetEntity="Timbrado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="timbrado_id", referencedColumnName="id")
     * })
     */
    private $timbrado;



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
     * Set inicioSecuencia
     *
     * @param integer $inicioSecuencia
     * @return Talonarios
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
     * @return Talonarios
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
     * @return Talonarios
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
     * Set caja
     *
     * @param \MejorPromo\BackendBundle\Entity\Cajas $caja
     * @return Talonarios
     */
    public function setCaja(\MejorPromo\BackendBundle\Entity\Cajas $caja = null)
    {
        $this->caja = $caja;
    
        return $this;
    }

    /**
     * Get caja
     *
     * @return \MejorPromo\BackendBundle\Entity\Cajas 
     */
    public function getCaja()
    {
        return $this->caja;
    }

    /**
     * Set timbrado
     *
     * @param \MejorPromo\BackendBundle\Entity\Timbrado $timbrado
     * @return Talonarios
     */
    public function setTimbrado(\MejorPromo\BackendBundle\Entity\Timbrado $timbrado = null)
    {
        $this->timbrado = $timbrado;
    
        return $this;
    }

    /**
     * Get timbrado
     *
     * @return \MejorPromo\BackendBundle\Entity\Timbrado 
     */
    public function getTimbrado()
    {
        return $this->timbrado;
    }
}