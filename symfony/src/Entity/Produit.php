<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[Vich\Uploadable]
#[ApiResource(normalizationContext: ['groups' => ['read:product']])]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["read:product",'read:avis','read:category','write:avis','post:Avis','post:Avis'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read:product",'read:avis','read:category','post:Avis'])]
    private $nom;

    #[ORM\Column(type: 'float')]
    #[Groups(["read:product",'read:category','post:Avis'])]
    private $prix;

    #[Groups(["read:product",'read:category','post:Avis'])]
    #[ORM\Column(type: 'text')]
    private $description;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     */
    #[Vich\UploadableField(mapping: 'image', fileNameProperty: 'img', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string')]
    #[Groups("product",'post:Avis')]
    private ?string $imageName = null;

    #[ORM\Column(type: 'integer')]
    private ?int $imageSize = null;

    #[ORM\Column(type: 'datetime')]

    private ?\DateTimeInterface $updatedAt = null;

    #[Groups("product")]
    private float $moyAvis;

    #[ORM\Column(type: 'string', length: 255 ,nullable: true)]
    #[Groups(["read:product",'read:category','post:Avis'])]
    private $img;


    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'produits',cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["read:product",'post:Avis'])]
    private Categorie $categorie;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Avis::class, orphanRemoval: true)]
    #[Groups(["read:product",'read:category'])]
    private $avis;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }




    public function __construct()
    {
        $this->avis = new ArrayCollection();
    }


    /**
     * @return float
     */
    public function getMoyAvis(): float
    {
        return $this->moyAvis;
    }

    /**
     * @param float $moyAvis
     */
    public function setMoyAvis(float $moyAvis): void
    {
        $this->moyAvis = $moyAvis;
    }


    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        $this->imageName = $this->nom;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setProduit($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getProduit() === $this) {
                $avi->setProduit(null);
            }
        }

        return $this;
    }




}
