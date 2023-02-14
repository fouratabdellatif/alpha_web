<?php

namespace App\Entity;

use App\Repository\RemorquageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RemorquageRepository::class)
 */
class Remorquage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Name is required")
     * @ORM\Column(type="string", length=255)
     */
    private $nameRemorquage;

    /**
     * @var string
     * @Assert\NotBlank(message="Prenom is required")
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     * @Assert\NotBlank(message="Email is required")
     * @ORM\Column(type="string", length=255)
     */
    private $emailRemorquage;

    /**
     * @var string
     * @Assert\NotBlank(message="Password is required")
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @var string
     * @Assert\NotBlank(message="Num Tel is required")
     * @ORM\Column(type="integer")
     */
    private $numeroTel;

    /**
     * @var \Service
     * @Assert\NotBlank(message="Service is required")
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serv", referencedColumnName="id")
     * })
     * @Groups("post:read")
     */
    private $serv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRemorquage(): ?string
    {
        return $this->nameRemorquage;
    }

    public function setNameRemorquage(string $nameRemorquage): self
    {
        $this->nameRemorquage = $nameRemorquage;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmailRemorquage(): ?string
    {
        return $this->emailRemorquage;
    }

    public function setEmailRemorquage(string $emailRemorquage): self
    {
        $this->emailRemorquage = $emailRemorquage;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNumeroTel(): ?int
    {
        return $this->numeroTel;
    }

    public function setNumeroTel(int $numeroTel): self
    {
        $this->numeroTel = $numeroTel;

        return $this;
    }

    public function getServ(): ?Service
    {
        return $this->serv;
    }

    public function setServ(Service $serv): self
    {
        $this->serv = $serv;

        return $this;
    }
}
