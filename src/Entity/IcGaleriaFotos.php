<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcGaleriaFotos
 *
 * @ORM\Table(name="ic_galeria_fotos", indexes={@ORM\Index(name="IDX_4B64F03D478D78F9", columns={"id_galeria"}), @ORM\Index(name="IDX_4B64F03DFCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class IcGaleriaFotos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_galeria_fotos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="foto", type="string", length=250, nullable=true)
     */
    private $foto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;

    /**
     * @var \IcGaleria
     *
     * @ORM\ManyToOne(targetEntity="IcGaleria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_galeria", referencedColumnName="id")
     * })
     */
    private $idGaleria;

    /**
     * @var \IcUsuario
     *
     * @ORM\ManyToOne(targetEntity="IcUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
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

    public function getIdGaleria(): ?IcGaleria
    {
        return $this->idGaleria;
    }

    public function setIdGaleria(?IcGaleria $idGaleria): self
    {
        $this->idGaleria = $idGaleria;

        return $this;
    }

    public function getIdUsuario(): ?IcUsuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?IcUsuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


}
