<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcContactoRespuesta
 *
 * @ORM\Table(name="ic_contacto_respuesta", indexes={@ORM\Index(name="IDX_AC476244779AA5A9", columns={"id_contacto"})})
 * @ORM\Entity
 */
class IcContactoRespuesta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_contacto_respuesta_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="respuesta", type="text", nullable=false)
     */
    private $respuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date", nullable=false)
     */
    private $creado;

    /**
     * @var \IcContacto
     *
     * @ORM\ManyToOne(targetEntity="IcContacto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contacto", referencedColumnName="id")
     * })
     */
    private $idContacto;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }

    public function getIdContacto(): ?IcContacto
    {
        return $this->idContacto;
    }

    public function setIdContacto(?IcContacto $idContacto): self
    {
        $this->idContacto = $idContacto;

        return $this;
    }


}
