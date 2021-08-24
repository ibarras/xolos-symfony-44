<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcPartidoJugadores
 *
 * @ORM\Table(name="ic_partido_jugadores", indexes={@ORM\Index(name="IDX_DC23A0C58A932B5B", columns={"id_calendario"}), @ORM\Index(name="IDX_DC23A0C58CE0C668", columns={"id_jugador"})})
 * @ORM\Entity
 */
class IcPartidoJugadores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_partido_jugadores_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="minutoe", type="integer", nullable=false)
     */
    private $minutoe;

    /**
     * @var int
     *
     * @ORM\Column(name="minutos", type="integer", nullable=false)
     */
    private $minutos;

    /**
     * @var int
     *
     * @ORM\Column(name="tarjeta_a1", type="integer", nullable=false)
     */
    private $tarjetaA1;

    /**
     * @var int
     *
     * @ORM\Column(name="tarjeta_a2", type="integer", nullable=false)
     */
    private $tarjetaA2;

    /**
     * @var int
     *
     * @ORM\Column(name="tarjeta_r", type="integer", nullable=false)
     */
    private $tarjetaR;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date", nullable=false)
     */
    private $creado;

    /**
     * @var int|null
     *
     * @ORM\Column(name="goles", type="integer", nullable=true)
     */
    private $goles;

    /**
     * @var \IcCalendario
     *
     * @ORM\ManyToOne(targetEntity="IcCalendario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_calendario", referencedColumnName="id")
     * })
     */
    private $idCalendario;

    /**
     * @var \IcJugadores
     *
     * @ORM\ManyToOne(targetEntity="IcJugadores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jugador", referencedColumnName="id")
     * })
     */
    private $idJugador;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinutoe(): ?int
    {
        return $this->minutoe;
    }

    public function setMinutoe(int $minutoe): self
    {
        $this->minutoe = $minutoe;

        return $this;
    }

    public function getMinutos(): ?int
    {
        return $this->minutos;
    }

    public function setMinutos(int $minutos): self
    {
        $this->minutos = $minutos;

        return $this;
    }

    public function getTarjetaA1(): ?int
    {
        return $this->tarjetaA1;
    }

    public function setTarjetaA1(int $tarjetaA1): self
    {
        $this->tarjetaA1 = $tarjetaA1;

        return $this;
    }

    public function getTarjetaA2(): ?int
    {
        return $this->tarjetaA2;
    }

    public function setTarjetaA2(int $tarjetaA2): self
    {
        $this->tarjetaA2 = $tarjetaA2;

        return $this;
    }

    public function getTarjetaR(): ?int
    {
        return $this->tarjetaR;
    }

    public function setTarjetaR(int $tarjetaR): self
    {
        $this->tarjetaR = $tarjetaR;

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

    public function getGoles(): ?int
    {
        return $this->goles;
    }

    public function setGoles(?int $goles): self
    {
        $this->goles = $goles;

        return $this;
    }

    public function getIdCalendario(): ?IcCalendario
    {
        return $this->idCalendario;
    }

    public function setIdCalendario(?IcCalendario $idCalendario): self
    {
        $this->idCalendario = $idCalendario;

        return $this;
    }

    public function getIdJugador(): ?IcJugadores
    {
        return $this->idJugador;
    }

    public function setIdJugador(?IcJugadores $idJugador): self
    {
        $this->idJugador = $idJugador;

        return $this;
    }


}
