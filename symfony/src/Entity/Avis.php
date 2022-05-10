<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


#[ORM\Entity(repositoryClass: AvisRepository::class)]
#[ApiResource(attributes:["datetime_format" => "d-m-Y"])]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("avis")]
    private $id;

    /*
    #[ORM\Column(type: 'datetime')]
    #[Assert\Date()]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    private ?\DateTimeInterface $dateAvis;
*/
    #[ORM\Column(type: 'integer')]
    #[Groups("avis")]
    private $note;

    #[ORM\Column(type: 'text')]
    #[Groups("avis")]
    private $detailsAvis;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'Avis')]
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }
/*
    public function getDateAvis(): ?\DateTimeInterface
    {
        return $this->dateAvis;
    }

    public function setDateAvis(\DateTimeInterface $dateAvis): self
    {
        $this->dateAvis = $dateAvis;

        return $this;
    }
*/
    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDetailsAvis(): ?string
    {
        return $this->detailsAvis;
    }

    public function setDetailsAvis(string $detailsAvis): self
    {
        $this->detailsAvis = $detailsAvis;

        return $this;
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
}
