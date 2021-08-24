<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcLocale
 *
 * @ORM\Table(name="ic_locale")
 * @ORM\Entity
 */
class IcLocale
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_locale", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_locale_id_locale_seq", allocationSize=1, initialValue=1)
     */
    private $idLocale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locale", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $locale;

    public function getIdLocale(): ?int
    {
        return $this->idLocale;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }


}
