<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcPreguntasFrecuentes
 *
 * @ORM\Table(name="ic_preguntas_frecuentes", indexes={@ORM\Index(name="IDX_1407A0CACE25AE0A", columns={"id_categoria"})})
 * @ORM\Entity
 */
class IcPreguntasFrecuentes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_preguntas_frecuentes_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pregunta", type="string", length=250, nullable=false)
     */
    private $pregunta;

    /**
     * @var string
     *
     * @ORM\Column(name="respuesta", type="text", nullable=false)
     */
    private $respuesta;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_activa", type="boolean", nullable=true, options={"default"="1"})
     */
    private $esActiva = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="foto", type="string", length=200, nullable=true)
     */
    private $foto;

    /**
     * @var \IcCategoria
     *
     * @ORM\ManyToOne(targetEntity="IcCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoria", referencedColumnName="id")
     * })
     */
    private $idCategoria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPregunta(): ?string
    {
        return $this->pregunta;
    }

    public function setPregunta(string $pregunta): self
    {
        $this->pregunta = $pregunta;

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

    public function getEsActiva(): ?bool
    {
        return $this->esActiva;
    }

    public function setEsActiva(?bool $esActiva): self
    {
        $this->esActiva = $esActiva;

        return $this;
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

    public function getIdCategoria(): ?IcCategoria
    {
        return $this->idCategoria;
    }

    public function setIdCategoria(?IcCategoria $idCategoria): self
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }


}
