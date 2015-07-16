<?php

namespace GlavBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Automotor
 *
 * @ORM\Table()
 * @ORM\Table(name="Automotor", indexes={@ORM\Index(name="FK_Automotor_TipoAutomotor", columns={"id_tipo_automotor"})})
 * @ORM\Entity(repositoryClass="GlavBundle\Entity\AutomotorRepository")
 */
class Automotor
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
     * @var \TipoAutomotor
     *
     * @ORM\ManyToOne(targetEntity="TipoAutomotor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_automotor", referencedColumnName="id")
     * })
     */
    
    private $id_tipo_automotor = 1;
    

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=250, nullable=true)
     */
    private $modelo;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="matricula", type="string", length=200, nullable=true)
     */
    private $matricula;

      
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
     * @return Automotor
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
     * Set id_tipo_automotor
     *
     * @param string $idTipoAutomotor
     * @return Automotor
     */
    public function setIdTipoAutomotor($idTipoAutomotor)
    {
        $this->id_tipo_automotor = $idTipoAutomotor;

        return $this;
    }

    /**
     * Get id_tipo_automotor
     *
     * @return string 
     */
    public function getIdTipoAutomotor()
    {
        return $this->id_tipo_automotor;
    }

    /**
     * Set tipo_rubro
     *
     * @param string $tipoRubro
     * @return Automotor
     */
    public function setTipoRubro($tipoRubro)
    {
        $this->tipo_rubro = $tipoRubro;

        return $this;
    }

    /**
     * Get tipo_rubro
     *
     * @return string 
     */
    public function getTipoRubro()
    {
        return $this->tipo_rubro;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Automotor
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set matricula
     *
     * @param string $matricula
     * @return Automotor
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Automotor
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
     * @return Automotor
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
        return $this->getMatricula();
    }
    
        public function getLabel()
    {
        return $this->matricula;
    }
}
