<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcPaginasEstaticas
 *
 * @ORM\Table(name="ic_paginas_estaticas")
 * @ORM\Entity
 */
class IcPaginasEstaticas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_paginas_estaticas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pagina", type="text", nullable=false)
     */
    private $pagina;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=200, nullable=true)
     */
    private $imagen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pie_de_pagina", type="text", nullable=true)
     */
    private $pieDePagina;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPagina(): ?string
    {
        return $this->pagina;
    }

    public function setPagina(string $pagina): self
    {
        $this->pagina = $pagina;

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

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getPieDePagina(): ?string
    {
        return $this->pieDePagina;
    }

    public function setPieDePagina(?string $pieDePagina): self
    {
        $this->pieDePagina = $pieDePagina;

        return $this;
    }


}
