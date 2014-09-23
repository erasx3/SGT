<?php

namespace Pepe\SistemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * turno
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pepe\SistemBundle\Entity\Repository\TurnoRepository")
 */
class Turno
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
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /**
     * @var float
     *
     * @ORM\Column(name="adelanto", type="float")
     */
    private $adelanto;

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
     * @ORM\ManyToOne(targetEntity="Servicio", inversedBy="turnos")
     * @ORM\JoinColumn(name="servicio_id", referencedColumnName="id")
     */
    private $servicio; 

    /**
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="turnos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;
    
    /**
     * @ORM\ManyToMany(targetEntity="Empleado", mappedBy="turnos")
     **/
    private $empleados;
    
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
     * @return Turno
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
     * Set hora
     *
     * @param \DateTime $hora
     * @return Turno
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set adelanto
     *
     * @param float $adelanto
     * @return Turno
     */
    public function setAdelanto($adelanto)
    {
        $this->adelanto = $adelanto;

        return $this;
    }

    /**
     * Get adelanto
     *
     * @return float 
     */
    public function getAdelanto()
    {
        return $this->adelanto;
    }

    /**
     * Set monto
     *
     * @param float $monto
     * @return Turno
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
     * Set servicio
     *
     * @param \Pepe\SistemBundle\Entity\servicio $servicio
     * @return Turno
     */
    public function setServicio(\Pepe\SistemBundle\Entity\servicio $servicio = null)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return \Pepe\SistemBundle\Entity\servicio 
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set cliente
     *
     * @param \Pepe\SistemBundle\Entity\cliente $cliente
     * @return Turno
     */
    public function setCliente(\Pepe\SistemBundle\Entity\cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Pepe\SistemBundle\Entity\cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Turno
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empleados = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add empleados
     *
     * @param \Pepe\SistemBundle\Entity\Empleado $empleados
     * @return Turno
     */
    public function addEmpleado(\Pepe\SistemBundle\Entity\Empleado $empleados)
    {
        $this->empleados[] = $empleados;

        return $this;
    }

    /**
     * Remove empleados
     *
     * @param \Pepe\SistemBundle\Entity\Empleado $empleados
     */
    public function removeEmpleado(\Pepe\SistemBundle\Entity\Empleado $empleados)
    {
        $this->empleados->removeElement($empleados);
    }

    /**
     * Get empleados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmpleados()
    {
        return $this->empleados;
    }
}
