<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcAcreditacionRespuesta
 *
 * @ORM\Table(name="ic_acreditacion_respuesta")
 * @ORM\Entity
 */
class IcAcreditacionRespuesta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_acreditacion_respuesta_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_acreditacion", type="integer", nullable=true)
     */
    private $idAcreditacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="respuesta", type="string", length=200, nullable=false)
     */
    private $respuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date", nullable=false)
     */
    private $creado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAcreditacion(): ?int
    {
        return $this->idAcreditacion;
    }

    public function setIdAcreditacion(?int $idAcreditacion): self
    {
        $this->idAcreditacion = $idAcreditacion;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getRespuesta(): ?string
    {
        return $this->respuesta;
    }

    public function setRespuesta(string $respuesta): self
    {
        $this->respuesta = $respuesta;

        return $this;
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

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }


}
