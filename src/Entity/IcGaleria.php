<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcGaleria
 *
 * @ORM\Table(name="ic_galeria", indexes={@ORM\Index(name="IDX_23EC1530CE25AE0A", columns={"id_categoria"}), @ORM\Index(name="IDX_23EC153067B77375", columns={"id_locale"}), @ORM\Index(name="IDX_23EC1530FCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class IcGaleria
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_galeria_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date", nullable=false)
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self
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
