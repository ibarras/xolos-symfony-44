<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcCalendario
 *
 * @ORM\Table(name="ic_calendario", indexes={@ORM\Index(name="IDX_FE0BC2D45ADCD613", columns={"id_torneo"}), @ORM\Index(name="IDX_FE0BC2D4BE31F08D", columns={"id_equipo_visitante"}), @ORM\Index(name="IDX_FE0BC2D4D25F2570", columns={"id_tecnico"}), @ORM\Index(name="IDX_FE0BC2D4E2ABE6E6", columns={"id_equipo"})})
 * @ORM\Entity
 */
class IcCalendario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_calendario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=true)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="jornada", type="integer", nullable=false)
     */
    private $jornada;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_activo", type="boolean", nullable=false)
     */
    private $esActivo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultafo_final", type="string", length=255, nullable=true)
     */
    private $resultafoFinal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date", nullable=false)
     */
    private $creado;

    /**
     * @var int
     *
     * @ORM\Column(name="fase", type="integer", nullable=false)
     */
    private $fase;

    /**
     * @var int
     *
     * @ORM\Column(name="equipo_local_resultado", type="integer", nullable=false)
     */
    private $equipoLocalResultado;

    /**
     * @var int
     *
     * @ORM\Column(name="equipo_visitante_resultado", type="integer", nullable=false)
     */
    private $equipoVisitanteResultado;

    /**
     * @var int|null
     *
     * @ORM\Column(name="equipo_local_resultado_penal", type="integer", nullable=true)
     */
    private $equipoLocalResultadoPenal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="equipo_visitante_resultado_penal", type="integer", nullable=true)
     */
    private $equipoVisitanteResultadoPenal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="grupo", type="integer", nullable=true)
     */
    private $grupo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hora", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $hora;

    /**
     * @var string|null
     *
     * @ORM\Column(name="boleto", type="text", nullable=true)
     */
    private $boleto;

    /**
     * @var \IcTorneo
     *
     * @ORM\ManyToOne(targetEntity="IcTorneo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_torneo", referencedColumnName="id")
     * })
     */
    private $idTorneo;

    /**
     * @var \IcEquipo
     *
     * @ORM\ManyToOne(targetEntity="IcEquipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo_visitante", referencedColumnName="id")
     * })
     */
    private $idEquipoVisitante;

    /**
     * @var \IcCuerpoTecnico
     *
     * @ORM\ManyToOne(targetEntity="IcCuerpoTecnico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tecnico", referencedColumnName="id")
     * })
     */
    private $idTecnico;

    /**
     * @var \IcEquipo
     *
     * @ORM\ManyToOne(targetEntity="IcEquipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo", referencedColumnName="id")
     * })
     */
    private $idEquipo;

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

    public function getJornada(): ?int
    {
        return $this->jornada;
    }

    public function setJornada(int $jornada): self
    {
        $this->jornada = $jornada;

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

    public function getResultafoFinal(): ?string
    {
        return $this->resultafoFinal;
    }

    public function setResultafoFinal(?string $resultafoFinal): self
    {
        $this->resultafoFinal = $resultafoFinal;

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

    public function getFase(): ?int
    {
        return $this->fase;
    }

    public function setFase(int $fase): self
    {
        $this->fase = $fase;

        return $this;
    }

    public function getEquipoLocalResultado(): ?int
    {
        return $this->equipoLocalResultado;
    }

    public function setEquipoLocalResultado(int $equipoLocalResultado): self
    {
        $this->equipoLocalResultado = $equipoLocalResultado;

        return $this;
    }

    public function getEquipoVisitanteResultado(): ?int
    {
        return $this->equipoVisitanteResultado;
    }

    public function setEquipoVisitanteResultado(int $equipoVisitanteResultado): self
    {
        $this->equipoVisitanteResultado = $equipoVisitanteResultado;

        return $this;
    }

    public function getEquipoLocalResultadoPenal(): ?int
    {
        return $this->equipoLocalResultadoPenal;
    }

    public function setEquipoLocalResultadoPenal(?int $equipoLocalResultadoPenal): self
    {
        $this->equipoLocalResultadoPenal = $equipoLocalResultadoPenal;

        return $this;
    }

    public function getEquipoVisitanteResultadoPenal(): ?int
    {
        return $this->equipoVisitanteResultadoPenal;
    }

    public function setEquipoVisitanteResultadoPenal(?int $equipoVisitanteResultadoPenal): self
    {
        $this->equipoVisitanteResultadoPenal = $equipoVisitanteResultadoPenal;

        return $this;
    }

    public function getGrupo(): ?int
    {
        return $this->grupo;
    }

    public function setGrupo(?int $grupo): self
    {
        $this->grupo = $grupo;

        return $this;
    }

    public function getHora(): ?string
    {
        return $this->hora;
    }

    public function setHora(?string $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getBoleto(): ?string
    {
        return $this->boleto;
    }

    public function setBoleto(?string $boleto): self
    {
        $this->boleto = $boleto;

        return $this;
    }

    public function getIdTorneo(): ?IcTorneo
    {
        return $this->idTorneo;
    }

    public function setIdTorneo(?IcTorneo $idTorneo): self
    {
        $this->idTorneo = $idTorneo;

        return $this;
    }

    public function getIdEquipoVisitante(): ?IcEquipo
    {
        return $this->idEquipoVisitante;
    }

    public function setIdEquipoVisitante(?IcEquipo $idEquipoVisitante): self
    {
        $this->idEquipoVisitante = $idEquipoVisitante;

        return $this;
    }

    public function getIdTecnico(): ?IcCuerpoTecnico
    {
        return $this->idTecnico;
    }

    public function setIdTecnico(?IcCuerpoTecnico $idTecnico): self
    {
        $this->idTecnico = $idTecnico;

        return $this;
    }

    public function getIdEquipo(): ?IcEquipo
    {
        return $this->idEquipo;
    }

    public function setIdEquipo(?IcEquipo $idEquipo): self
    {
        $this->idEquipo = $idEquipo;

        return $this;
    }


}
