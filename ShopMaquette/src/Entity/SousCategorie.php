<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SousCategorieRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

#[ORM\Entity(repositoryClass: SousCategorieRepository::class)]
#[Vich\Uploadable]
#[ApiResource(
    normalizationContext: ["groups" => ["souscategorie:read"]],           //Get utiliter
    denormalizationContext: ["groups" => ["souscategorie:write"]]         //POST PUT PATCH utiliter
)]
class SousCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(["souscategorie:read", "souscategorie:write"])]
    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[Vich\UploadableField(mapping: 'souscategorie_image', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[Groups(["souscategorie:read", "souscategorie:write"])]
    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    #[Groups(["souscategorie:read", "souscategorie:write"])]
    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'souscategorie')]
    private Collection $produits;

    #[Groups(["souscategorie:read", "souscategorie:write"])]
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updateAt = null;

    #[Groups(["souscategorie:read", "souscategorie:write"])]
    #[ORM\ManyToOne(inversedBy: 'sousCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;


    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->updateAt = new \DateTimeImmutable();
    }


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

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updateAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image = null): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->addSouscategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeSouscategorie($this);
        }

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function __toString()        //return le nom en string de la SousCategorie
    {
        return $this->nom;
        return $this->image;
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

    
}
