<?php

namespace GlavBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rubro
 *
 * @ORM\Table()
 * @ORM\Table(name="Rubro", indexes={@ORM\Index(name="FK_Rubro_TipoRubro", columns={"id_tipo_rubro"})})
 * @ORM\Entity(repositoryClass="GlavBundle\Entity\RubroRepository")
 */
class Rubro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=50, nullable=true)
     */
    
    private $hash;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    
    
    private $nombre;
    
    /**
     * @var \TipoRubro
     *
     * @ORM\ManyToOne(targetEntity="TipoRubro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_rubro", referencedColumnName="id")
     * })
     */
    private $id_tipo_rubro;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=45, nullable=true)
     */
    private $descripcion;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=200, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="iva", type="string", length=200, nullable=true)
     */
    private $iva;
    

    
        /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado = 1;
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;
    
    function __construct(){
        $this->hash=md5(time());
        $this->fecha =  new \DateTime('now');
        #$this->id_tipo_rubro = '1';
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
     * Set hash
     *
     * @param string $hash
     * @return Rubro
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string 
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Rubro
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
     * Set id_tipo_rubro
     *
     * @param string $idTipoRubro
     * @return Rubro
     */
    public function setIdTipoRubro($idTipoRubro)
    {
        $this->id_tipo_rubro = $idTipoRubro;

        return $this;
    }

    /**
     * Get id_tipo_rubro
     *
     * @return string 
     */
    public function getIdTipoRubro()
    {
        return $this->id_tipo_rubro;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Rubro
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return Rubro
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set iva
     *
     * @param string $iva
     * @return Rubro
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return string 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Rubro
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Rubro
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    public function __toString()
    {
        return $this->getNombre();
    }
    public function getLabel()
    {
        return $this->nombre .' $'. $this->valor;
    }
}
