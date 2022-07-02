<?php

namespace App\Entity;

use App\Repository\FanRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=FanRepository::class)
 */
class IcFan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @Assert\Email(
     *     message = "El correo'{{ value }}' no tiene formato valido."
     * )
     *  @ORM\Column(type="string", length=255, unique="true")
     */


    private $email;

    /**
     * @Assert\Image(
     *     mimeTypes    = "image/jpeg, image/jpg, image/png",
     *     maxSize      = "5M",
     *     maxSizeMessage  = "La imagen es muy grande ({{ maxSize }})px, baje la resolucion de la camara"
     * )
     * @ORM\Column(type="string", length=255)
     */

    private $card_image;

    /**
     * @Assert\Image(
     *     mimeTypes    = "image/jpeg, image/jpg, image/png",
     *     maxSize      = "5M",
     *     maxSizeMessage  = "La imagen es muy grande ({{ maxSize }})px, baje la resolucion de la camara"
     * )
     * @ORM\Column(type="string", length=255)
     */


    private $face_image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $validate_email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCardImage(): ?string
    {
        return $this->card_image;
    }

    public function setCardImage(string $image_card): self
    {
        $this->card_image = $image_card;

        return $this;
    }

    public function getFaceImage(): ?string
    {
        return $this->face_image;
    }

    public function setFaceImage(string $image_face): self
    {
        $this->face_image = $image_face;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getValidateEmail(): ?bool
    {
        return $this->validate_email;
    }

    public function setValidateEmail(?bool $validate_email): self
    {
        $this->validate_email = $validate_email;

        return $this;
    }
}