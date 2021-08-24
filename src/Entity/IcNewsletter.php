<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcNewsletter
 *
 * @ORM\Table(name="ic_newsletter")
 * @ORM\Entity
 */
class IcNewsletter
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_newsletter_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo", type="string", length=250, nullable=true)
     */
    private $correo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="token", type="string", length=100, nullable=true)
     */
    private $token;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_valido", type="boolean", nullable=true)
     */
    private $esValido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(?string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getEsValido(): ?bool
    {
        return $this->esValido;
    }

    public function setEsValido(?bool $esValido): self
    {
        $this->esValido = $esValido;

        return $this;
    }


}
