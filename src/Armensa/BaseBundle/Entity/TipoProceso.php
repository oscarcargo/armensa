<?php

namespace Armensa\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoProceso
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoProceso
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
     * @return TipoProceso
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
     * @return string
     */
    public function __toString()
    {
        return $this->tipo;
    }
}
