<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcRevista
 *
 * @ORM\Table(name="ic_revista", indexes={@ORM\Index(name="IDX_13B3D2FFFCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class IcRevista
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_revista_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archivo", type="string", length=200, nullable=true)
     */
    private $archivo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado", type="date", nullable=true)
     */
    private $creado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portada", type="string", length=200, nullable=true)
     */
    private $portada;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_activo", type="boolean", nullable=true)
     */
    private $esActivo;

    /**
     * @var \IcUsuario
     *
     * @ORM\ManyToOne(targetEntity="IcUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArchivo(): ?string
    {
        return $this->archivo;
    }

    public function setArchivo(?string $archivo): self
    {
        $this->archivo = $archivo;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(?\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }

    public function getPortada(): ?string
    {
        return $this->portada;
    }

    public function setPortada(?string $portada): self
    {
        $this->portada = $portada;

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

    public function getEsActivo(): ?bool
    {
        return $this->esActivo;
    }

    public function setEsActivo(?bool $esActivo): self
    {
        $this->esActivo = $esActivo;

        return $this;
    }

    public function getIdUsuario(): ?IcUsuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?IcUsuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


}
