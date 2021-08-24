<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcTorneoEquipoGrupo
 *
 * @ORM\Table(name="ic_torneo_equipo_grupo", indexes={@ORM\Index(name="IDX_50F180035ADCD613", columns={"id_torneo"}), @ORM\Index(name="IDX_50F18003E2ABE6E6", columns={"id_equipo"})})
 * @ORM\Entity
 */
class IcTorneoEquipoGrupo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_torneo_equipo_grupo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="grupo", type="integer", nullable=true)
     */
    private $grupo;

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
     *   @ORM\JoinColumn(name="id_equipo", referencedColumnName="id")
     * })
     */
    private $idEquipo;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdTorneo(): ?IcTorneo
    {
        return $this->idTorneo;
    }

    public function setIdTorneo(?IcTorneo $idTorneo): self
    {
        $this->idTorneo = $idTorneo;

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
