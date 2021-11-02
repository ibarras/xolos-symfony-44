<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcCuerpoTecnico
 *
 * @ORM\Table(name="ic_cuerpo_tecnico", indexes={@ORM\Index(name="fki_id_categoria_jugador", columns={"id_categoria_jugador"}), @ORM\Index(name="IDX_38C7D002DB396746", columns={"id_posicion"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\IcCuerpoTecnicoRepository")
 */
class IcCuerpoTecnico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_cuerpo_tecnico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_de_nacimiento", type="date", nullable=true)
     */
    private $fechaDeNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="equipos", type="string", length=200, nullable=true)
     */
    private $equipos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="biografia", type="text", nullable=true)
     */
    private $biografia;

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
     * @ORM\Column(name="lugar_de_nacimiento", type="string", length=250, nullable=true)
     */
    private $lugarDeNacimiento;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_activo", type="boolean", nullable=false)
     */
    private $esActivo;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_entrenador", type="boolean", nullable=true)
     */
    private $esEntrenador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="biografia_en", type="text", nullable=true)
     */
    private $biografiaEn;

    /**
     * @var \IcJugadorPosicion
     *
     * @ORM\ManyToOne(targetEntity="IcJugadorPosicion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_posicion", referencedColumnName="id_jugador_posicion")
     * })
     */
    private $idPosicion;

    /**
     * @var \IcJugadorCategoria
     *
     * @ORM\ManyToOne(targetEntity="IcJugadorCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoria_jugador", referencedColumnName="id")
     * })
     */
    private $idCategoriaJugador;

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

    public function getFechaDeNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaDeNacimiento;
    }

    public function setFechaDeNacimiento(?\DateTimeInterface $fechaDeNacimiento): self
    {
        $this->fechaDeNacimiento = $fechaDeNacimiento;

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

    public function getBiografia(): ?string
    {
        return $this->biografia;
    }

    public function setBiografia(?string $biografia): self
    {
        $this->biografia = $biografia;

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

    public function getEsEntrenador(): ?bool
    {
        return $this->esEntrenador;
    }

    public function setEsEntrenador(?bool $esEntrenador): self
    {
        $this->esEntrenador = $esEntrenador;

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

    public function getIdPosicion(): ?IcJugadorPosicion
    {
        return $this->idPosicion;
    }

    public function setIdPosicion(?IcJugadorPosicion $idPosicion): self
    {
        $this->idPosicion = $idPosicion;

        return $this;
    }

    public function getIdCategoriaJugador(): ?IcJugadorCategoria
    {
        return $this->idCategoriaJugador;
    }

    public function setIdCategoriaJugador(?IcJugadorCategoria $idCategoriaJugador): self
    {
        $this->idCategoriaJugador = $idCategoriaJugador;

        return $this;
    }


}
