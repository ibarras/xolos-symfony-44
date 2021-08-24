<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcJugadores
 *
 * @ORM\Table(name="ic_jugadores", indexes={@ORM\Index(name="IDX_6647B2D2C6072891", columns={"id_jugador_categoria"}), @ORM\Index(name="IDX_6647B2D25A862F49", columns={"id_posicion_jugador"})})
 * @ORM\Entity
 */
class IcJugadores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_jugadores_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=250, nullable=true)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_de_nacimiento", type="date", nullable=true)
     */
    private $fechaDeNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="estatura", type="string", length=255, nullable=true)
     */
    private $estatura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="peso", type="string", length=255, nullable=true)
     */
    private $peso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="equipos", type="text", nullable=true)
     */
    private $equipos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fotografia", type="string", length=200, nullable=true)
     */
    private $fotografia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fotografia_de_perfil", type="string", length=200, nullable=true)
     */
    private $fotografiaDePerfil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lugar_de_nacimiento", type="string", length=200, nullable=true)
     */
    private $lugarDeNacimiento;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_activo", type="boolean", nullable=false)
     */
    private $esActivo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_de_red_social", type="string", length=200, nullable=true)
     */
    private $linkDeRedSocial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="biografia", type="text", nullable=true)
     */
    private $biografia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="biografia_en", type="text", nullable=true)
     */
    private $biografiaEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fotografia_app", type="string", length=200, nullable=true)
     */
    private $fotografiaApp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fotografia_de_perfil_app", type="string", length=200, nullable=true)
     */
    private $fotografiaDePerfilApp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="instagram", type="string", length=200, nullable=true)
     */
    private $instagram;

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=200, nullable=true)
     */
    private $facebook;

    /**
     * @var \IcJugadorCategoria
     *
     * @ORM\ManyToOne(targetEntity="IcJugadorCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jugador_categoria", referencedColumnName="id")
     * })
     */
    private $idJugadorCategoria;

    /**
     * @var \IcJugadorPosicion
     *
     * @ORM\ManyToOne(targetEntity="IcJugadorPosicion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_posicion_jugador", referencedColumnName="id_jugador_posicion")
     * })
     */
    private $idPosicionJugador;

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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getFechaDeNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaDeNacimiento;
    }

    public function setFechaDeNacimiento(?\DateTimeInterface $fechaDeNacimiento): self
    {
        $this->fechaDeNacimiento = $fechaDeNacimiento;

        return $this;
    }

    public function getEstatura(): ?string
    {
        return $this->estatura;
    }

    public function setEstatura(?string $estatura): self
    {
        $this->estatura = $estatura;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(?string $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getEquipos(): ?string
    {
        return $this->equipos;
    }

    public function setEquipos(?string $equipos): self
    {
        $this->equipos = $equipos;

        return $this;
    }

    public function getFotografia(): ?string
    {
        return $this->fotografia;
    }

    public function setFotografia(?string $fotografia): self
    {
        $this->fotografia = $fotografia;

        return $this;
    }

    public function getFotografiaDePerfil(): ?string
    {
        return $this->fotografiaDePerfil;
    }

    public function setFotografiaDePerfil(?string $fotografiaDePerfil): self
    {
        $this->fotografiaDePerfil = $fotografiaDePerfil;

        return $this;
    }

    public function getLugarDeNacimiento(): ?string
    {
        return $this->lugarDeNacimiento;
    }

    public function setLugarDeNacimiento(?string $lugarDeNacimiento): self
    {
        $this->lugarDeNacimiento = $lugarDeNacimiento;

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

    public function getLinkDeRedSocial(): ?string
    {
        return $this->linkDeRedSocial;
    }

    public function setLinkDeRedSocial(?string $linkDeRedSocial): self
    {
        $this->linkDeRedSocial = $linkDeRedSocial;

        return $this;
    }

    public function getBiografia(): ?string
    {
        return $this->biografia;
    }

    public function setBiografia(?string $biografia): self
    {
        $this->biografia = $biografia;

        return $this;
    }

    public function getBiografiaEn(): ?string
    {
        return $this->biografiaEn;
    }

    public function setBiografiaEn(?string $biografiaEn): self
    {
        $this->biografiaEn = $biografiaEn;

        return $this;
    }

    public function getFotografiaApp(): ?string
    {
        return $this->fotografiaApp;
    }

    public function setFotografiaApp(?string $fotografiaApp): self
    {
        $this->fotografiaApp = $fotografiaApp;

        return $this;
    }

    public function getFotografiaDePerfilApp(): ?string
    {
        return $this->fotografiaDePerfilApp;
    }

    public function setFotografiaDePerfilApp(?string $fotografiaDePerfilApp): self
    {
        $this->fotografiaDePerfilApp = $fotografiaDePerfilApp;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getIdJugadorCategoria(): ?IcJugadorCategoria
    {
        return $this->idJugadorCategoria;
    }

    public function setIdJugadorCategoria(?IcJugadorCategoria $idJugadorCategoria): self
    {
        $this->idJugadorCategoria = $idJugadorCategoria;

        return $this;
    }

    public function getIdPosicionJugador(): ?IcJugadorPosicion
    {
        return $this->idPosicionJugador;
    }

    public function setIdPosicionJugador(?IcJugadorPosicion $idPosicionJugador): self
    {
        $this->idPosicionJugador = $idPosicionJugador;

        return $this;
    }


}
