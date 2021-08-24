<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcTablaPosicion
 *
 * @ORM\Table(name="ic_tabla_posicion", indexes={@ORM\Index(name="IDX_D22B400A1A5E629A", columns={"id_temporada"}), @ORM\Index(name="IDX_D22B400AE2ABE6E6", columns={"id_equipo"})})
 * @ORM\Entity
 */
class IcTablaPosicion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_tabla_posicion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="pts", type="integer", nullable=false)
     */
    private $pts;

    /**
     * @var int
     *
     * @ORM\Column(name="dif", type="integer", nullable=false)
     */
    private $dif;

    /**
     * @var int|null
     *
     * @ORM\Column(name="gc", type="integer", nullable=true)
     */
    private $gc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="gf", type="integer", nullable=true)
     */
    private $gf;

    /**
     * @var int|null
     *
     * @ORM\Column(name="jp", type="integer", nullable=true)
     */
    private $jp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="je", type="integer", nullable=true)
     */
    private $je;

    /**
     * @var int|null
     *
     * @ORM\Column(name="jg", type="integer", nullable=true)
     */
    private $jg;

    /**
     * @var int|null
     *
     * @ORM\Column(name="jj", type="integer", nullable=true)
     */
    private $jj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="opcion", type="integer", nullable=true)
     */
    private $opcion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="local", type="integer", nullable=true)
     */
    private $local;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visita", type="integer", nullable=true)
     */
    private $visita;

    /**
     * @var \IcTorneo
     *
     * @ORM\ManyToOne(targetEntity="IcTorneo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_temporada", referencedColumnName="id")
     * })
     */
    private $idTemporada;

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

    public function getPts(): ?int
    {
        return $this->pts;
    }

    public function setPts(int $pts): self
    {
        $this->pts = $pts;

        return $this;
    }

    public function getDif(): ?int
    {
        return $this->dif;
    }

    public function setDif(int $dif): self
    {
        $this->dif = $dif;

        return $this;
    }

    public function getGc(): ?int
    {
        return $this->gc;
    }

    public function setGc(?int $gc): self
    {
        $this->gc = $gc;

        return $this;
    }

    public function getGf(): ?int
    {
        return $this->gf;
    }

    public function setGf(?int $gf): self
    {
        $this->gf = $gf;

        return $this;
    }

    public function getJp(): ?int
    {
        return $this->jp;
    }

    public function setJp(?int $jp): self
    {
        $this->jp = $jp;

        return $this;
    }

    public function getJe(): ?int
    {
        return $this->je;
    }

    public function setJe(?int $je): self
    {
        $this->je = $je;

        return $this;
    }

    public function getJg(): ?int
    {
        return $this->jg;
    }

    public function setJg(?int $jg): self
    {
        $this->jg = $jg;

        return $this;
    }

    public function getJj(): ?int
    {
        return $this->jj;
    }

    public function setJj(?int $jj): self
    {
        $this->jj = $jj;

        return $this;
    }

    public function getOpcion(): ?int
    {
        return $this->opcion;
    }

    public function setOpcion(?int $opcion): self
    {
        $this->opcion = $opcion;

        return $this;
    }

    public function getLocal(): ?int
    {
        return $this->local;
    }

    public function setLocal(?int $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function getVisita(): ?int
    {
        return $this->visita;
    }

    public function setVisita(?int $visita): self
    {
        $this->visita = $visita;

        return $this;
    }

    public function getIdTemporada(): ?IcTorneo
    {
        return $this->idTemporada;
    }

    public function setIdTemporada(?IcTorneo $idTemporada): self
    {
        $this->idTemporada = $idTemporada;

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
