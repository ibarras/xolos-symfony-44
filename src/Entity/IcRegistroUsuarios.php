<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcRegistroUsuarios
 *
 * @ORM\Table(name="ic_registro_usuarios")
 * @ORM\Entity
 */
class IcRegistroUsuarios
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_registro_usuarios_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=200, nullable=false)
     */
    private $correo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_red_social", type="string", length=100, nullable=true)
     */
    private $idRedSocial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="social_name", type="string", length=255, nullable=true)
     */
    private $socialName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    private $facebookAccessToken;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=true)
     */
    private $password;

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

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getIdRedSocial(): ?string
    {
        return $this->idRedSocial;
    }

    public function setIdRedSocial(?string $idRedSocial): self
    {
        $this->idRedSocial = $idRedSocial;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSocialName(): ?string
    {
        return $this->socialName;
    }

    /**
     * @param string|null $socialName
     */
    public function setSocialName(?string $socialName): void
    {
        $this->socialName = $socialName;
    }

    /**
     * @return string|null
     */
    public function getFacebookAccessToken(): ?string
    {
        return $this->facebookAccessToken;
    }

    /**
     * @param string|null $facebookAccessToken
     */
    public function setFacebookAccessToken(?string $facebookAccessToken): void
    {
        $this->facebookAccessToken = $facebookAccessToken;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

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
