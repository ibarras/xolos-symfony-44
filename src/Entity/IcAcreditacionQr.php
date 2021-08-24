<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcAcreditacionQr
 *
 * @ORM\Table(name="ic_acreditacion_qr")
 * @ORM\Entity
 */
class IcAcreditacionQr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_acreditacion_qr_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="string", length=50, nullable=true)
     */
    private $codigo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="asignado", type="date", nullable=true)
     */
    private $asignado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="bloqueado", type="date", nullable=true)
     */
    private $bloqueado;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=true)
     */
    private $estatus = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comentario", type="string", length=250, nullable=true)
     */
    private $comentario;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getAsignado(): ?\DateTimeInterface
    {
        return $this->asignado;
    }

    public function setAsignado(?\DateTimeInterface $asignado): self
    {
        $this->asignado = $asignado;

        return $this;
    }

    public function getBloqueado(): ?\DateTimeInterface
    {
        return $this->bloqueado;
    }

    public function setBloqueado(?\DateTimeInterface $bloqueado): self
    {
        $this->bloqueado = $bloqueado;

        return $this;
    }

    public function getEstatus(): ?bool
    {
        return $this->estatus;
    }

    public function setEstatus(?bool $estatus): self
    {
        $this->estatus = $estatus;

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

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(?int $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }


}
