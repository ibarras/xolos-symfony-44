<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcVideo
 *
 * @ORM\Table(name="ic_video", indexes={@ORM\Index(name="IDX_57E5A592CE25AE0A", columns={"id_categoria"}), @ORM\Index(name="IDX_57E5A59267B77375", columns={"id_locale"})})
 * @ORM\Entity
 */
class IcVideo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_video_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado", type="date", nullable=true)
     */
    private $creado;

    /**
     * @var \IcCategoria
     *
     * @ORM\ManyToOne(targetEntity="IcCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoria", referencedColumnName="id")
     * })
     */
    private $idCategoria;

    /**
     * @var \IcLocale
     *
     * @ORM\ManyToOne(targetEntity="IcLocale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_locale", referencedColumnName="id_locale")
     * })
     */
    private $idLocale;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
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

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(?\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }

    public function getIdCategoria(): ?IcCategoria
    {
        return $this->idCategoria;
    }

    public function setIdCategoria(?IcCategoria $idCategoria): self
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    public function getIdLocale(): ?IcLocale
    {
        return $this->idLocale;
    }

    public function setIdLocale(?IcLocale $idLocale): self
    {
        $this->idLocale = $idLocale;

        return $this;
    }


}
