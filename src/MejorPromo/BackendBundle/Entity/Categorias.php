<?php

namespace MejorPromo\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity
 */
class Categorias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="categorias_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="slug", type="string", length=150, nullable=false)
     *
     * @Assert\NotNull(message="El dato slug no puede ser nulo.")
     * @Assert\MinLength(limit=5, message="El texto para slug es muy corto. Se debe registrar como mínimo {{ limit }} caracteres o más.")
     * @Assert\MaxLength(limit=150, message="El texto para slug es muy largo. Sólo se aceptan hasta {{ limit }} caracteres o menos.")
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     *
     * @Assert\NotNull(message="El dato estado no puede ser nulo.")
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ofertas", mappedBy="categoria")
     */
    private $oferta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tiendas", inversedBy="categorias")
     * @ORM\JoinTable(name="tiendas_categorias",
     *   joinColumns={
     *     @ORM\JoinColumn(name="categorias_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tiendas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tiendas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuarios", mappedBy="categorias")
     */
    private $usuarios;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_padre", referencedColumnName="id")
     * })
     */
    private $categoriaPadre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oferta = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tiendas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Categorias
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
     * Set slug
     *
     * @param string $slug
     * @return Categorias
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
     * Set estado
     *
     * @param integer $estado
     * @return Categorias
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
     * Add oferta
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $oferta
     * @return Categorias
     */
    public function addOferta(\MejorPromo\BackendBundle\Entity\Ofertas $oferta)
    {
        $this->oferta[] = $oferta;
    
        return $this;
    }

    /**
     * Remove oferta
     *
     * @param \MejorPromo\BackendBundle\Entity\Ofertas $oferta
     */
    public function removeOferta(\MejorPromo\BackendBundle\Entity\Ofertas $oferta)
    {
        $this->oferta->removeElement($oferta);
    }

    /**
     * Get oferta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Add tiendas
     *
     * @param \MejorPromo\BackendBundle\Entity\Tiendas $tiendas
     * @return Categorias
     */
    public function addTienda(\MejorPromo\BackendBundle\Entity\Tiendas $tiendas)
    {
        $this->tiendas[] = $tiendas;
    
        return $this;
    }

    /**
     * Remove tiendas
     *
     * @param \MejorPromo\BackendBundle\Entity\Tiendas $tiendas
     */
    public function removeTienda(\MejorPromo\BackendBundle\Entity\Tiendas $tiendas)
    {
        $this->tiendas->removeElement($tiendas);
    }

    /**
     * Get tiendas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTiendas()
    {
        return $this->tiendas;
    }

    /**
     * Add usuarios
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $usuarios
     * @return Categorias
     */
    public function addUsuario(\MejorPromo\BackendBundle\Entity\Usuarios $usuarios)
    {
        $this->usuarios[] = $usuarios;
    
        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \MejorPromo\BackendBundle\Entity\Usuarios $usuarios
     */
    public function removeUsuario(\MejorPromo\BackendBundle\Entity\Usuarios $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Set categoriaPadre
     *
     * @param \MejorPromo\BackendBundle\Entity\Categorias $categoriaPadre
     * @return Categorias
     */
    public function setCategoriaPadre(\MejorPromo\BackendBundle\Entity\Categorias $categoriaPadre = null)
    {
        $this->categoriaPadre = $categoriaPadre;
    
        return $this;
    }

    /**
     * Get categoriaPadre
     *
     * @return \MejorPromo\BackendBundle\Entity\Categorias 
     */
    public function getCategoriaPadre()
    {
        return $this->categoriaPadre;
    }
}