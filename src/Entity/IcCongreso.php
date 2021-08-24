<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcCongreso
 *
 * @ORM\Table(name="ic_congreso")
 * @ORM\Entity
 */
class IcCongreso
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_congreso_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=250, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=250, nullable=false)
     */
    private $apellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="talla", type="string", length=10, nullable=false, options={"fixed"=true})
     */
    private $talla;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=false, options={"fixed"=true})
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="domincilio", type="string", length=250, nullable=false)
     */
    private $domincilio;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="enterado", type="string", length=250, nullable=true)
     */
    private $enterado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getTalla(): ?string
    {
        return $this->talla;
    }

    public function setTalla(string $talla): self
    {
        $this->talla = $talla;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getDomincilio(): ?string
    {
        return $this->domincilio;
    }

    public function setDomincilio(string $domincilio): self
    {
        $this->domincilio = $domincilio;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEnterado(): ?string
    {
        return $this->enterado;
    }

    public function setEnterado(?string $enterado): self
    {
        $this->enterado = $enterado;

        return $this;
    }


}
