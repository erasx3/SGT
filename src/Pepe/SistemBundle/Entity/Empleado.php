<?php

namespace Pepe\SistemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * empleado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pepe\SistemBundle\Entity\Repository\EmpleadoRepository")
 */
class Empleado
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
     * @ORM\Column(name="dni", type="string", length=255)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=255)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=50)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="cuil", type="string", length=100)
     */
    private $cuil;
    
     /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=255)
     */
    private $usuario;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Puesto", inversedBy="empleados")
     * @ORM\JoinColumn(name="puesto_id", referencedColumnName="id")
     */
    private $puesto;

    /**
     *
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="empleado")
     */
    private $pagos;
    
    /**
     *
     * 
     * @ORM\ManyToMany(targetEntity="Turno", inversedBy="empleados")
     * @ORM\JoinTable(name="empleados_turnos")
     **/  
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
     * Set dni
     *
     * @param string $dni
     * @return Empleado
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Empleado
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
     * Set apellido
     *
     * @param string $apellido
     * @return Empleado
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Empleado
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set cuil
     *
     * @param string $cuil
     * @return Empleado
     */
    public function setCuil($cuil)
    {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get cuil
     *
     * @return string 
     */
    public function getCuil()
    {
        return $this->cuil;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set puesto
     *
     * @param \Pepe\SistemBundle\Entity\puesto $puesto
     * @return Empleado
     */
    public function setPuesto(\Pepe\SistemBundle\Entity\puesto $puesto = null)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return \Pepe\SistemBundle\Entity\puesto 
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Add pagos
     *
     * @param \Pepe\SistemBundle\Entity\pago $pagos
     * @return Empleado
     */
    public function addPago(\Pepe\SistemBundle\Entity\pago $pagos)
    {
        $this->pagos[] = $pagos;

        return $this;
    }

    /**
     * Remove pagos
     *
     * @param \Pepe\SistemBundle\Entity\pago $pagos
     */
    public function removePago(\Pepe\SistemBundle\Entity\pago $pagos)
    {
        $this->pagos->removeElement($pagos);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagos()
    {
        return $this->pagos;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Empleado
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
     * Add turnos
     *
     * @param \Pepe\SistemBundle\Entity\Turno $turnos
     * @return Empleado
     */
    public function addTurno(\Pepe\SistemBundle\Entity\Turno $turnos)
    {
        $this->turnos[] = $turnos;

        return $this;
    }

    /**
     * Remove turnos
     *
     * @param \Pepe\SistemBundle\Entity\Turno $turnos
     */
    public function removeTurno(\Pepe\SistemBundle\Entity\Turno $turnos)
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
}
