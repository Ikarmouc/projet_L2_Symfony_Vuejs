<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
#[ApiResource(denormalizationContext: ['groups' => ['avis']],
)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("avis")]
    private $id;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'avis')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["avis","product"])]
    private $produit;

    #[ORM\Column(type: 'integer')]
    #[Groups("avis")]
    private $note;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(["avis","product"])]
    private $comments;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["avis","product"])]
    private $username;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}
