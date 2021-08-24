<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcAccion
 *
 * @ORM\Table(name="ic_accion", indexes={@ORM\Index(name="IDX_A6F05F40BF4FB5CF", columns={"id_jornada"}), @ORM\Index(name="IDX_A6F05F407A9D85B", columns={"id_tipo_accion"}), @ORM\Index(name="IDX_A6F05F4067B77375", columns={"id_locale"})})
 * @ORM\Entity
 */
class IcAccion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_accion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="minuto", type="string", length=200, nullable=true)
     */
    private $minuto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nonbre_jugador", type="string", length=200, nullable=true)
     */
    private $nonbreJugador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comentario", type="string", length=200, nullable=true)
     */
    private $comentario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_gol", type="string", length=250, nullable=true)
     */
    private $urlGol;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="horario", type="datetime", nullable=true)
     */
    private $horario;

    /**
     * @var \IcCalendario
     *
     * @ORM\ManyToOne(targetEntity="IcCalendario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jornada", referencedColumnName="id")
     * })
     */
    private $idJornada;

    /**
     * @var \IcTipoAccion
     *
     * @ORM\ManyToOne(targetEntity="IcTipoAccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_accion", referencedColumnName="id")
     * })
     */
    private $idTipoAccion;

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

    public function getMinuto(): ?string
    {
        return $this->minuto;
    }

    public function setMinuto(?string $minuto): self
    {
        $this->minuto = $minuto;

        return $this;
    }

    public function getNonbreJugador(): ?string
    {
        return $this->nonbreJugador;
    }

    public function setNonbreJugador(?string $nonbreJugador): self
    {
        $this->nonbreJugador = $nonbreJugador;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getUrlGol(): ?string
    {
        return $this->urlGol;
    }

    public function setUrlGol(?string $urlGol): self
    {
        $this->urlGol = $urlGol;

        return $this;
    }

    public function getHorario(): ?\DateTimeInterface
    {
        return $this->horario;
    }

    public function setHorario(?\DateTimeInterface $horario): self
    {
        $this->horario = $horario;

        return $this;
    }

    public function getIdJornada(): ?IcCalendario
    {
        return $this->idJornada;
    }

    public function setIdJornada(?IcCalendario $idJornada): self
    {
        $this->idJornada = $idJornada;

        return $this;
    }

    public function getIdTipoAccion(): ?IcTipoAccion
    {
        return $this->idTipoAccion;
    }

    public function setIdTipoAccion(?IcTipoAccion $idTipoAccion): self
    {
        $this->idTipoAccion = $idTipoAccion;

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
