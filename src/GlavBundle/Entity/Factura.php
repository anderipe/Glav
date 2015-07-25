<?php
namespace GlavBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Factura
 *
 * @ORM\Table(name="Factura", indexes={})
 * @ORM\Entity(repositoryClass="GlavBundle\Entity\FacturaRepository")
 */
class Factura
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
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", length=50)
     */
    
    
    private $id_usuario;

    
    
        /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=255)
     */
    
    
    private $valor;
    
        /**
     * @var string
     *
     * @ORM\Column(name="iva", type="string", length=255)
     */
    
    
    private $iva = "1.16";
    
    /**
     * @var string
     *
     * @ORM\Column(name="total", type="string", length=255)
     */
    
    
    private $total;
    
    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    
    
    private $observacion = 'Sin observacion';
        
      
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
     * @return Factura
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
     * Set id_usuario
     *
     * @param integer $idUsuario
     * @return Factura
     */
    public function setIdUsuario($idUsuario)
    {
        $this->id_usuario = $idUsuario;
        return $this;
    }
    /**
     * Get id_usuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    /**
     * Set valor
     *
     * @param string $valor
     * @return Factura
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
     * @return Factura
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
     * Set total
     *
     * @param string $total
     * @return Factura
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }
    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Factura
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
        return $this;
    }
    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
    /**
     * Set estado
     *
     * @param string $estado
     * @return Factura
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
     * @return Factura
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
        return $this->getId();
    }
}
