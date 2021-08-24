<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcNoticia
 *
 * @ORM\Table(name="ic_noticia")
 * @ORM\Entity
 */
class IcNoticia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_noticia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_noticia_en", type="integer", nullable=true)
     */
    private $idNoticiaEn;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado", type="date", nullable=true)
     */
    private $creado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdNoticiaEn(): ?int
    {
        return $this->idNoticiaEn;
    }

    public function setIdNoticiaEn(?int $idNoticiaEn): self
    {
        $this->idNoticiaEn = $idNoticiaEn;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(?\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }


}
