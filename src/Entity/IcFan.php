<?php

namespace App\Entity;

use App\IcUtils\IcUpload;
use App\Repository\FanRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=FanRepository::class)
 */
class IcFan extends IcUpload
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @Assert\Email(
     *     message = "El correo'{{ value }}' no tiene formato valido."
     * )
     *  @ORM\Column(name="email", type="string", length=255, unique="true")
     */


    private $email;

    /**
     * @ORM\Column(name="card_image", type="string", length=255)
     */

    private $card_image;

    /**
     * @ORM\Column(name="face_image", type="string", length=255)
     */


    private $face_image;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(name="validate_email", type="boolean", nullable=true)
     */
    private $validate_email;

    /**
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @ORM\Column(name="is_valid", type="boolean", nullable=true)
     */
    private $is_valid;

    /**
     * @Assert\Image(
     *     mimeTypes    = "image/jpeg, image/jpg, image/png",
     *     maxSize      = "5M",
     *     maxSizeMessage  = "La imagen es muy grande ({{ maxSize }})px, baje la resolucion de la camara"
     * )
     */
    private $ic_image_face;

    /**
     * @Assert\Image(
     *     mimeTypes    = "image/jpeg, image/jpg, image/png",
     *     maxSize      = "5M",
     *     maxSizeMessage  = "La imagen es muy grande ({{ maxSize }})px, baje la resolucion de la camara"
     * )
     */
    private $ic_image_card;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
    }
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

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->is_valid;
    }

    /**
     * @param mixed $is_valid
     */
    public function setIsValid($is_valid): void
    {
        $this->is_valid = $is_valid;
    }

    public function getIcImageCard(): ?string
    {
        return $this->ic_image_card;
    }

    public function setIcImageCard(File $file = null)
    {
        $image = $this->setFile($file, 'FanId/');
        $this->ic_image_card = $image;
        return $this;

    }

    public function getIcImageFace(): ?string
    {
        return $this->ic_image_face;
    }

    public function setIcImageFace(File $file = null): self
    {
        $image = $this->setFile($file, 'FanId/');
        $this->ic_image_face = $image;
        return $this;
    }


}