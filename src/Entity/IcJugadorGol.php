<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcJugadorGol
 *
 * @ORM\Table(name="ic_jugador_gol")
 * @ORM\Entity
 */
class IcJugadorGol
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="id_jugador", type="integer", nullable=false)
     */
    private $idJugador;

    /**
     * @var \IcJugadores
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="IcJugadores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jugador_gol", referencedColumnName="id")
     * })
     */
    private $idJugadorGol;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getIdJugador(): ?int
    {
        return $this->idJugador;
    }

    public function setIdJugador(int $idJugador): self
    {
        $this->idJugador = $idJugador;

        return $this;
    }

    public function getIdJugadorGol(): ?IcJugadores
    {
        return $this->idJugadorGol;
    }

    public function setIdJugadorGol(?IcJugadores $idJugadorGol): self
    {
        $this->idJugadorGol = $idJugadorGol;

        return $this;
    }


}
