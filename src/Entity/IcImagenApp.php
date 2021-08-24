<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcImagenApp
 *
 * @ORM\Table(name="ic_imagen_app", indexes={@ORM\Index(name="IDX_3B6C7BC5EB2E95C", columns={"id_tipo_imagen"})})
 * @ORM\Entity
 */
class IcImagenApp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_imagen_app_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_activo", type="boolean", nullable=false)
     */
    private $esActivo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=200, nullable=true)
     */
    private $imagen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link", type="string", length=200, nullable=true)
     */
    private $link;

    /**
     * @var \IcTipoImagenApp
     *
     * @ORM\ManyToOne(targetEntity="IcTipoImagenApp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_imagen", referencedColumnName="id")
     * })
     */
    private $idTipoImagen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(?\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(?\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    public function getEsActivo(): ?bool
    {
        return $this->esActivo;
    }

    public function setEsActivo(bool $esActivo): self
    {
        $this->esActivo = $esActivo;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getIdTipoImagen(): ?IcTipoImagenApp
    {
        return $this->idTipoImagen;
    }

    public function setIdTipoImagen(?IcTipoImagenApp $idTipoImagen): self
    {
        $this->idTipoImagen = $idTipoImagen;

        return $this;
    }


}
