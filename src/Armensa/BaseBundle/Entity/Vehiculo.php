<?php

namespace Armensa\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehiculo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Vehiculo
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
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var integer
     *
     * @ORM\Column(name="modelo", type="integer")
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="placa", type="string", length=10)
     */
    private $placa;
    /**
     * @ORM\ManyToOne(targetEntity="Armensa\BaseBundle\Entity\TipoVehiculo",cascade={"persist"})
     * @ORM\JoinColumn(name="tipoVehiculo", referencedColumnName="id")
     */
    private $tipoVehiculo;

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
     * Set marca
     *
     * @param string $marca
     * @return Vehiculo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param integer $modelo
     * @return Vehiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return integer 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set placa
     *
     * @param string $placa
     * @return Vehiculo
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa
     *
     * @return string 
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set tipoVehiculo
     *
     * @param \Armensa\BaseBundle\Entity\TipoVehiculo $tipoVehiculo
     * @return Vehiculo
     */
    public function setTipoVehiculo(\Armensa\BaseBundle\Entity\TipoVehiculo $tipoVehiculo = null)
    {
        $this->tipoVehiculo = $tipoVehiculo;

        return $this;
    }

    /**
     * Get tipoVehiculo
     *
     * @return \Armensa\BaseBundle\Entity\TipoVehiculo
     */
    public function getTipoVehiculo()
    {
        return $this->tipoVehiculo;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->placa;
    }
}
