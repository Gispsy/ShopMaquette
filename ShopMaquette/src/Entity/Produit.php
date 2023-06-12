<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[Vich\Uploadable]
#[ApiResource(
    normalizationContext: ["groups" => ["produit:read"]],           //Get utiliter
    denormalizationContext: ["groups" => ["produit:write"]]         //POST PUT PATCH utiliter
)]

class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(["produit:read", "produit:write"])]
    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    #[Groups(["produit:read", "produit:write"])]
    #[ORM\Column]
    private ?int $quantiter = null;

    #[Groups(["produit:read", "produit:write"])]
    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    #[Groups(["produit:read", "produit:write"])]
    private ?string $prixPHUT = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[Groups(["produit:read", "produit:write"])]
    private ?Fournisseur $fournisseur = null;


    #[ORM\ManyToMany(targetEntity: SousCategorie::class, inversedBy: 'produits')]
    private Collection $souscategorie;

    #[ORM\Column(nullable: true)]
    private ?bool $Publicité = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Image::class)]
    #[Groups(["produit:read", "produit:write"])]
    private Collection $image;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, mappedBy: 'produit')]
    private Collection $commandes;

    public function __construct()
    {
        $this->souscategorie = new ArrayCollection();
        $this->image = new ArrayCollection();
        $this->commandes = new ArrayCollection();
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

    public function getQuantiter(): ?int
    {
        return $this->quantiter;
    }

    public function setQuantiter(int $quantiter): self
    {
        $this->quantiter = $quantiter;

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

    public function getPrixPHUT(): ?string
    {
        return $this->prixPHUT;
    }

    public function setPrixPHUT(string $prixPHUT): self
    {
        $this->prixPHUT = $prixPHUT;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, SousCategorie>
     */
    public function getSouscategorie(): Collection
    {
        return $this->souscategorie;
    }

    public function addSouscategorie(SousCategorie $souscategorie): self
    {
        if (!$this->souscategorie->contains($souscategorie)) {
            $this->souscategorie->add($souscategorie);
        }

        return $this;
    }

    public function removeSouscategorie(SousCategorie $souscategorie): self
    {
        $this->souscategorie->removeElement($souscategorie);

        return $this;
    }

    public function __toString()        //return le nom en string du produit
    {
        return $this->nom;
    }

    public function getPublicité(): ?bool
    {
        return $this->Publicité;
    }

    public function setPublicité(?bool $Publicité): self
    {
        $this->Publicité = $Publicité;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Image $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image->add($image);
            $image->setProduit($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduit() === $this) {
                $image->setProduit(null);
            }
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

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->addProduit($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeProduit($this);
        }

        return $this;
    }

}
