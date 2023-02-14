<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Libelle Service is required")
     * @ORM\Column(type="string", length=255)
     */
    private $libelleService;

    /**
     * @var string
     * @Assert\NotBlank(message="Nom Service is required")
     * @ORM\Column(type="string", length=255)
     */
    private $nomService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleService(): ?string
    {
        return $this->libelleService;
    }

    public function setLibelleService(string $libelleService): self
    {
        $this->libelleService = $libelleService;

        return $this;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): self
    {
        $this->nomService = $nomService;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->libelleService;
    }
}
