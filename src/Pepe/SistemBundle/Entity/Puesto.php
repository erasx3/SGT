<?php

namespace Pepe\SistemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * puesto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pepe\SistemBundle\Entity\Repository\PuestoRepository")
 */
class Puesto
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;
    
     /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=255)
     */
    private $usuario;

    /**
     *
     * @ORM\OneToMany(targetEntity="Empleado", mappedBy="puesto")
     */
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
     * Set nombre
     *
     * @param string $nombre
     * @return Puesto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Puesto
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
     * Constructor
     */
    public function __construct()
    {
        $this->empleados = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add empleados
     *
     * @param \Pepe\SistemBundle\Entity\empleado $empleados
     * @return Puesto
     */
    public function addEmpleado(\Pepe\SistemBundle\Entity\empleado $empleados)
    {
        $this->empleados[] = $empleados;

        return $this;
    }

    /**
     * Remove empleados
     *
     * @param \Pepe\SistemBundle\Entity\empleado $empleados
     */
    public function removeEmpleado(\Pepe\SistemBundle\Entity\empleado $empleados)
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

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Puesto
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
