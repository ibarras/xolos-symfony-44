<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcJugadorPosicion
 *
 * @ORM\Table(name="ic_jugador_posicion")
 * @ORM\Entity
 */
class IcJugadorPosicion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_jugador_posicion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_jugador_posicion_id_jugador_posicion_seq", allocationSize=1, initialValue=1)
     */
    private $idJugadorPosicion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=100, nullable=true)
     */
    private $position;

    public function getIdJugadorPosicion(): ?int
    {
        return $this->idJugadorPosicion;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }


}
