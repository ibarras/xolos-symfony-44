<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcTraduccion
 *
 * @ORM\Table(name="ic_traduccion", indexes={@ORM\Index(name="IDX_D35005D6CE25AE0A", columns={"id_categoria"}), @ORM\Index(name="IDX_D35005D667B77375", columns={"id_locale"}), @ORM\Index(name="IDX_D35005D6EFBDF6E6", columns={"id_noticia"}), @ORM\Index(name="IDX_D35005D6FCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class IcTraduccion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_traduccion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo", type="string", length=250, nullable=true)
     */
    private $titulo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="intro", type="string", length=250, nullable=true)
     */
    private $intro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nota", type="text", nullable=true)
     */
    private $nota;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pie_de_foto", type="string", length=250, nullable=true)
     */
    private $pieDeFoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=250, nullable=true)
     */
    private $slug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen_principal", type="string", length=255, nullable=true)
     */
    private $imagenPrincipal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen_nota", type="string", length=255, nullable=true)
     */
    private $imagenNota;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modificado", type="date", nullable=true)
     */
    private $modificado;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=true, options={"default"="1"})
     */
    private $estatus = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado", type="date", nullable=true)
     */
    private $creado;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_global", type="boolean", nullable=true)
     */
    private $esGlobal = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen_app", type="string", length=200, nullable=true)
     */
    private $imagenApp;

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
     * @var \IcNoticia
     *
     * @ORM\ManyToOne(targetEntity="IcNoticia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_noticia", referencedColumnName="id")
     * })
     */
    private $idNoticia;

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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(?string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    public function getNota(): ?string
    {
        return $this->nota;
    }

    public function setNota(?string $nota): self
    {
        $this->nota = $nota;

        return $this;
    }

    public function getPieDeFoto(): ?string
    {
        return $this->pieDeFoto;
    }

    public function setPieDeFoto(?string $pieDeFoto): self
    {
        $this->pieDeFoto = $pieDeFoto;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImagenPrincipal(): ?string
    {
        return $this->imagenPrincipal;
    }

    public function setImagenPrincipal(?string $imagenPrincipal): self
    {
        $this->imagenPrincipal = $imagenPrincipal;

        return $this;
    }

    public function getImagenNota(): ?string
    {
        return $this->imagenNota;
    }

    public function setImagenNota(?string $imagenNota): self
    {
        $this->imagenNota = $imagenNota;

        return $this;
    }

    public function getModificado(): ?\DateTimeInterface
    {
        return $this->modificado;
    }

    public function setModificado(?\DateTimeInterface $modificado): self
    {
        $this->modificado = $modificado;

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

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(?\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }

    public function getEsGlobal(): ?bool
    {
        return $this->esGlobal;
    }

    public function setEsGlobal(?bool $esGlobal): self
    {
        $this->esGlobal = $esGlobal;

        return $this;
    }

    public function getImagenApp(): ?string
    {
        return $this->imagenApp;
    }

    public function setImagenApp(?string $imagenApp): self
    {
        $this->imagenApp = $imagenApp;

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

    public function getIdNoticia(): ?IcNoticia
    {
        return $this->idNoticia;
    }

    public function setIdNoticia(?IcNoticia $idNoticia): self
    {
        $this->idNoticia = $idNoticia;

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
