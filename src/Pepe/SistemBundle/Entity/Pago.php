<?php

namespace Pepe\SistemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pago
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pepe\SistemBundle\Entity\Repository\PagoRepository")
 */
class Pago
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
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255)
     */
    private $concepto;

    /**
     * @var float
     *
     * @ORM\Column(name="monto", type="float")
     */
    private $monto;
    
     /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=255)
     */
    private $usuario;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="pagos")
     * @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     */
    private $empleado;

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
     * @return Pago
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
     * Set concepto
     *
     * @param string $concepto
     * @return Pago
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set monto
     *
     * @param float $monto
     * @return Pago
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set empleado
     *
     * @param \Pepe\SistemBundle\Entity\empleado $empleado
     * @return Pago
     */
    public function setEmpleado(\Pepe\SistemBundle\Entity\empleado $empleado = null)
    {
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get empleado
     *
     * @return \Pepe\SistemBundle\Entity\empleado 
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Pago
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
