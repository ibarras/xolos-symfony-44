<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcAcreditacion
 *
 * @ORM\Table(name="ic_acreditacion")
 * @ORM\Entity
 */
class IcAcreditacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ic_acreditacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=250, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=200, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_de_medio", type="string", length=250, nullable=false)
     */
    private $tipoDeMedio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_de_acreditacion", type="string", length=200, nullable=false)
     */
    private $tipoDeAcreditacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado", type="date", nullable=false)
     */
    private $creado;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=200, nullable=false)
     */
    private $foto;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_activo", type="boolean", nullable=false)
     */
    private $esActivo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="jefe_inmediato", type="string", length=200, nullable=true)
     */
    private $jefeInmediato;

    /**
     * @var int
     *
     * @ORM\Column(name="id_acreditacion_qr", type="integer", nullable=false)
     */
    private $idAcreditacionQr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_del_medio", type="string", length=200, nullable=true)
     */
    private $nombreDelMedio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="funcion", type="string", length=250, nullable=true)
     */
    private $funcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @var string|null
     *
     * @ORM\Column(name="especifique", type="string", length=250, nullable=true)
     */
    private $especifique;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
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

    public function getTipoDeMedio(): ?string
    {
        return $this->tipoDeMedio;
    }

    public function setTipoDeMedio(string $tipoDeMedio): self
    {
        $this->tipoDeMedio = $tipoDeMedio;

        return $this;
    }

    public function getTipoDeAcreditacion(): ?string
    {
        return $this->tipoDeAcreditacion;
    }

    public function setTipoDeAcreditacion(string $tipoDeAcreditacion): self
    {
        $this->tipoDeAcreditacion = $tipoDeAcreditacion;

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

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getEsActivo(): ?bool
    {
        return $this->esActivo;
    }

    public function setEsActivo(bool $esActivo): self
    {
        $this->esActivo = $esActivo;

        return $this;
    }

    public function getJefeInmediato(): ?string
    {
        return $this->jefeInmediato;
    }

    public function setJefeInmediato(?string $jefeInmediato): self
    {
        $this->jefeInmediato = $jefeInmediato;

        return $this;
    }

    public function getIdAcreditacionQr(): ?int
    {
        return $this->idAcreditacionQr;
    }

    public function setIdAcreditacionQr(int $idAcreditacionQr): self
    {
        $this->idAcreditacionQr = $idAcreditacionQr;

        return $this;
    }

    public function getNombreDelMedio(): ?string
    {
        return $this->nombreDelMedio;
    }

    public function setNombreDelMedio(?string $nombreDelMedio): self
    {
        $this->nombreDelMedio = $nombreDelMedio;

        return $this;
    }

    public function getFuncion(): ?string
    {
        return $this->funcion;
    }

    public function setFuncion(?string $funcion): self
    {
        $this->funcion = $funcion;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getEspecifique(): ?string
    {
        return $this->especifique;
    }

    public function setEspecifique(?string $especifique): self
    {
        $this->especifique = $especifique;

        return $this;
    }


}
