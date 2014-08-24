<?php

namespace Armensa\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoVehiculo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoVehiculo
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var float
     *
     * @ORM\Column(name="tarifa", type="float")
     */
    private $tarifa;


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
     * Set tipo
     *
     * @param string $tipo
     * @return TipoVehiculo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set tarifa
     *
     * @param float $tarifa
     * @return TipoVehiculo
     */
    public function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    /**
     * Get tarifa
     *
     * @return float
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->tipo;
    }
}
