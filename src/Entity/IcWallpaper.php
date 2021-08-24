<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcWallpaper
 *
 * @ORM\Table(name="ic_wallpaper")
 * @ORM\Entity
 */
class IcWallpaper
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_wallpaper_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=false)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="autor", type="string", length=200, nullable=true)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=200, nullable=false)
     */
    private $imagen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="autor_link_red_social", type="string", length=250, nullable=true)
     */
    private $autorLinkRedSocial;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(?string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getAutorLinkRedSocial(): ?string
    {
        return $this->autorLinkRedSocial;
    }

    public function setAutorLinkRedSocial(?string $autorLinkRedSocial): self
    {
        $this->autorLinkRedSocial = $autorLinkRedSocial;

        return $this;
    }


}
