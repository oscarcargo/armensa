<?php

namespace Armensa\ViajesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Viaje
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Viaje
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @ORM\ManyToOne(targetEntity="Armensa\UserBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    private $usuario;



    /**
     * @ORM\ManyToOne(targetEntity="Armensa\BaseBundle\Entity\Conductor",cascade={"persist"})
     * @ORM\JoinColumn(name="conductor", referencedColumnName="id")
     */
    private $conductor;

    /**
     * @ORM\ManyToOne(targetEntity="Armensa\BaseBundle\Entity\Vehiculo",cascade={"persist"})
     * @ORM\JoinColumn(name="vehiculo", referencedColumnName="id")
     */
    private $vehiculo;

    /**
     * @ORM\ManyToOne(targetEntity="Armensa\BaseBundle\Entity\Cliente",cascade={"persist"})
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="origen", type="string", length=255)
     */
    private $origen;

    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="string", length=255)
     */
    private $destino;

    /**
     * @ORM\ManyToOne(targetEntity="Armensa\BaseBundle\Entity\TipoProceso",cascade={"persist"})
     * @ORM\JoinColumn(name="tipoProceso", referencedColumnName="id")
     */
    private $tipoProceso;

    /**
     * @var float
     *
     * @ORM\Column(name="valorCompra", type="float")
     */
    private $valorCompra;

    /**
     * @var float
     *
     * @ORM\Column(name="valorVenta", type="float")
     */
    private $valorVenta;

    /**
     * @var float
     *
     * @ORM\Column(name="peso", type="float")
     */
    private $peso;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="observciones", type="text")
     */
    private $observciones;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Viaje
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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Viaje
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set origen
     *
     * @param string $origen
     * @return Viaje
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Viaje
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set valorCompra
     *
     * @param float $valorCompra
     * @return Viaje
     */
    public function setValorCompra($valorCompra)
    {
        $this->valorCompra = $valorCompra;

        return $this;
    }

    /**
     * Get valorCompra
     *
     * @return float
     */
    public function getValorCompra()
    {
        return $this->valorCompra;
    }

    /**
     * Set valorVenta
     *
     * @param float $valorVenta
     * @return Viaje
     */
    public function setValorVenta($valorVenta)
    {
        $this->valorVenta = $valorVenta;

        return $this;
    }

    /**
     * Get valorVenta
     *
     * @return float
     */
    public function getValorVenta()
    {
        return $this->valorVenta;
    }

    /**
     * Set peso
     *
     * @param float $peso
     * @return Viaje
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return float
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Viaje
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set observciones
     *
     * @param string $observciones
     * @return Viaje
     */
    public function setObservciones($observciones)
    {
        $this->observciones = $observciones;

        return $this;
    }

    /**
     * Get observciones
     *
     * @return string
     */
    public function getObservciones()
    {
        return $this->observciones;
    }

    /**
     * Set usuario
     *
     * @param \Armensa\UserBundle\Entity\User $usuario
     * @return Viaje
     */
    public function setUsuario(\Armensa\UserBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Armensa\UserBundle\Entity\User
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set conductor
     *
     * @param \Armensa\BaseBundle\Entity\Conductor $conductor
     * @return Viaje
     */
    public function setConductor(\Armensa\BaseBundle\Entity\Conductor $conductor = null)
    {
        $this->conductor = $conductor;

        return $this;
    }

    /**
     * Get conductor
     *
     * @return \Armensa\BaseBundle\Entity\Conductor
     */
    public function getConductor()
    {
        return $this->conductor;
    }

    /**
     * Set vehiculo
     *
     * @param \Armensa\BaseBundle\Entity\Vehiculo $vehiculo
     * @return Viaje
     */
    public function setVehiculo(\Armensa\BaseBundle\Entity\Vehiculo $vehiculo = null)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return \Armensa\BaseBundle\Entity\Vehiculo
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Set cliente
     *
     * @param \Armensa\BaseBundle\Entity\Cliente $cliente
     * @return Viaje
     */
    public function setCliente(\Armensa\BaseBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Armensa\BaseBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set tipoProceso
     *
     * @param \Armensa\BaseBundle\Entity\TipoProceso $tipoProceso
     * @return Viaje
     */
    public function setTipoProceso(\Armensa\BaseBundle\Entity\TipoProceso $tipoProceso = null)
    {
        $this->tipoProceso = $tipoProceso;

        return $this;
    }

    /**
     * Get tipoProceso
     *
     * @return \Armensa\BaseBundle\Entity\TipoProceso
     */
    public function getTipoProceso()
    {
        return $this->tipoProceso;
    }
}
