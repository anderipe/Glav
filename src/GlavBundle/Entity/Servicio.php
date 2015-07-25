<?php

namespace GlavBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="Servicio", indexes={@ORM\Index(name="FK_Servicio_Cliente", columns={"id_cliente"}),@ORM\Index(name="FK_Servicio_Empleado", columns={"id_empleado"}),@ORM\Index(name="FK_Servicio_Automotor", columns={"id_automotor"}),@ORM\Index(name="FK_Servicio_Rubro", columns={"id_rubro"})})
 * @ORM\Entity(repositoryClass="GlavBundle\Entity\ServicioRepository")
 */
class Servicio
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
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     * })
     */
    
    
    private $id_cliente;
    
    /**
     * @var \Empleado
     *
     * @ORM\ManyToOne(targetEntity="Empleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empleado", referencedColumnName="id")
     * })
     */
    
    
    private $id_empleado;
    
    /**
     * @var \Automotor
     *
     * @ORM\ManyToOne(targetEntity="Automotor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_automotor", referencedColumnName="id")
     * })
     */
    
    
    private $id_automotor;
    

    
    /**
     * @var \Rubro
     *
     * @ORM\ManyToOne(targetEntity="Rubro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rubro", referencedColumnName="id")
     * })
     */
    
    private $id_rubro;
    
    /**
     * @var string
     *
     * @ORM\Column(name="estado_servicio", type="string", length=255)
     */
    
    
    private $estadoServicio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    
    
    private $observacion = "Sin observacion";
    
    /**
     * @var string
     *
     * @ORM\Column(name="pago", type="string", length=255)
     */
    
    
    private $pago="Pendiente";
    
        
        
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_servicio", type="datetime", nullable=true)
     */
    private $fecha_servicio;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrega", type="datetime", nullable=true)
     */
    private $fecha_entrega;

      
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
        $this->fecha_servicio =  new \DateTime('now');
        $this->fecha_entrega =  new \DateTime('now');


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
     * @return Servicio
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
     * @return Servicio
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
     * Set id_cliente
     *
     * @param integer $idCliente
     * @return Servicio
     */
    public function setIdCliente($idCliente)
    {
        $this->id_cliente = $idCliente;

        return $this;
    }

    /**
     * Get id_cliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set id_empleado
     *
     * @param integer $idEmpleado
     * @return Servicio
     */
    public function setIdEmpleado($idEmpleado)
    {
        $this->id_empleado = $idEmpleado;

        return $this;
    }

    /**
     * Get id_empleado
     *
     * @return integer 
     */
    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }

    /**
     * Set id_automotor
     *
     * @param integer $idAutomotor
     * @return Servicio
     */
    public function setIdAutomotor($idAutomotor)
    {
        $this->id_automotor = $idAutomotor;

        return $this;
    }

    /**
     * Get id_automotor
     *
     * @return integer 
     */
    public function getIdAutomotor()
    {
        return $this->id_automotor;
    }

    /**
     * Set id_estado_servicio
     *
     * @param integer $idEstadoServicio
     * @return Servicio
     */
    public function setIdEstadoServicio($idEstadoServicio)
    {
        $this->id_estado_servicio = $idEstadoServicio;

        return $this;
    }

    /**
     * Get id_estado_servicio
     *
     * @return integer 
     */
    public function getIdEstadoServicio()
    {
        return $this->id_estado_servicio;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Servicio
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
     * Set fecha_servicio
     *
     * @param \DateTime $fechaServicio
     * @return Servicio
     */
    public function setFechaServicio($fechaServicio)
    {
        $this->fecha_servicio = $fechaServicio;

        return $this;
    }

    /**
     * Get fecha_servicio
     *
     * @return \DateTime 
     */
    public function getFechaServicio()
    {
        return $this->fecha_servicio;
    }

    /**
     * Set fecha_entrega
     *
     * @param \DateTime $fechaEntrega
     * @return Servicio
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fecha_entrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get fecha_entrega
     *
     * @return \DateTime 
     */
    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Servicio
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
     * @return Servicio
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

    /**
     * Set id_servicio_estado
     *
     * @param \GlavBundle\Entity\ServicioEstado $idServicioEstado
     * @return Servicio
     */
    public function setIdServicioEstado(\GlavBundle\Entity\ServicioEstado $idServicioEstado = null)
    {
        $this->id_servicio_estado = $idServicioEstado;

        return $this;
    }

    /**
     * Get id_servicio_estado
     *
     * @return \GlavBundle\Entity\ServicioEstado 
     */
    public function getIdServicioEstado()
    {
        return $this->id_servicio_estado;
    }

    /**
     * Set id_rubro
     *
     * @param \GlavBundle\Entity\Rubro $idRubro
     * @return Servicio
     */
    public function setIdRubro(\GlavBundle\Entity\Rubro $idRubro = null)
    {
        $this->id_rubro = $idRubro;

        return $this;
    }

    /**
     * Get id_rubro
     *
     * @return \GlavBundle\Entity\Rubro 
     */
    public function getIdRubro()
    {
        return $this->id_rubro;
    }

    /**
     * Set estadoServicio
     *
     * @param string $estadoServicio
     * @return Servicio
     */
    public function setEstadoServicio($estadoServicio)
    {
        $this->estadoServicio = $estadoServicio;

        return $this;
    }

    /**
     * Get estadoServicio
     *
     * @return string 
     */
    public function getEstadoServicio()
    {
        return $this->estadoServicio;
    }


    /**
     * Set pago
     *
     * @param string $pago
     * @return Servicio
     */
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return string 
     */
    public function getPago()
    {
        return $this->pago;
    }
    
    public function __toString()
    {
        return $this->getObservacion();
    }
    
    public function getLabel()
    {
        return $this->getIdAutomotor();
    }
}
