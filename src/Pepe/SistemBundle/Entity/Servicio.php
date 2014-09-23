<?php

namespace Pepe\SistemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * servicio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pepe\SistemBundle\Entity\Repository\ServicioRepository")
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255)
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
     * @ORM\OneToMany(targetEntity="Turno", mappedBy="servicio")
     */
    private $turnos;


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
     * @return Servicio
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
     * @return Servicio
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
        $this->turnos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add turnos
     *
     * @param \Pepe\SistemBundle\Entity\turno $turnos
     * @return Servicio
     */
    public function addTurno(\Pepe\SistemBundle\Entity\turno $turnos)
    {
        $this->turnos[] = $turnos;

        return $this;
    }

    /**
     * Remove turnos
     *
     * @param \Pepe\SistemBundle\Entity\turno $turnos
     */
    public function removeTurno(\Pepe\SistemBundle\Entity\turno $turnos)
    {
        $this->turnos->removeElement($turnos);
    }

    /**
     * Get turnos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTurnos()
    {
        return $this->turnos;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Servicio
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
