<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcXolopass
 *
 * @ORM\Table(name="ic_xolopass")
 * @ORM\Entity
 */
class IcXolopass
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_xolopass_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localizador", type="string", length=50, nullable=true)
     */
    private $localizador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="evento", type="string", length=100, nullable=true, options={"fixed"=true})
     */
    private $evento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido", type="string", length=100, nullable=true)
     */
    private $apellido;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zona", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $zona;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fila", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $fila;

    /**
     * @var string|null
     *
     * @ORM\Column(name="butaca", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $butaca;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigoqr", type="string", length=30, nullable=true, options={"fixed"=true})
     */
    private $codigoqr;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=true, options={"default"="1"})
     */
    private $estatus = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalizador(): ?string
    {
        return $this->localizador;
    }

    public function setLocalizador(?string $localizador): self
    {
        $this->localizador = $localizador;

        return $this;
    }

    public function getEvento(): ?string
    {
        return $this->evento;
    }

    public function setEvento(?string $evento): self
    {
        $this->evento = $evento;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getZona(): ?string
    {
        return $this->zona;
    }

    public function setZona(?string $zona): self
    {
        $this->zona = $zona;

        return $this;
    }

    public function getFila(): ?string
    {
        return $this->fila;
    }

    public function setFila(?string $fila): self
    {
        $this->fila = $fila;

        return $this;
    }

    public function getButaca(): ?string
    {
        return $this->butaca;
    }

    public function setButaca(?string $butaca): self
    {
        $this->butaca = $butaca;

        return $this;
    }

    public function getCodigoqr(): ?string
    {
        return $this->codigoqr;
    }

    public function setCodigoqr(?string $codigoqr): self
    {
        $this->codigoqr = $codigoqr;

        return $this;
    }

    public function getEstatus(): ?bool
    {
        return $this->estatus;
    }

    public function setEstatus(?bool $estatus): self
    {
        $this->estatus = $estatus;

        return $this;
    }


}
