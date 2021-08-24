<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcJugadorVoto
 *
 * @ORM\Table(name="ic_jugador_voto", indexes={@ORM\Index(name="IDX_469D3C108A932B5B", columns={"id_calendario"}), @ORM\Index(name="IDX_469D3C108CE0C668", columns={"id_jugador"})})
 * @ORM\Entity
 */
class IcJugadorVoto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_jugador_voto_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="session", type="string", length=200, nullable=true)
     */
    private $session;

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

    public function getSession(): ?string
    {
        return $this->session;
    }

    public function setSession(?string $session): self
    {
        $this->session = $session;

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
