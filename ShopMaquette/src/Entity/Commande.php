<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"string", length:36, unique:true)]
    private ?string $reference = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'commandes')]
    private Collection $produit;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Client $client = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $adresselivraison = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseFacturation = null;

    #[ORM\Column(length: 50)]
    private ?string $payement = null;

    #[ORM\Column(nullable: true)]
    private ?float $total = null;

    #[ORM\Column]
    private ?int $quantiter = null;

    #[ORM\OneToMany(mappedBy: 'commandeReference', targetEntity: BonLivraison::class)]
    private Collection $bonLivraisons;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Facture $commandeFacture = null;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
        $this->bonLivraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit->add($produit);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        $this->produit->removeElement($produit);

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAdresselivraison(): ?string
    {
        return $this->adresselivraison;
    }

    public function setAdresselivraison(string $adresselivraison): self
    {
        $this->adresselivraison = $adresselivraison;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation(string $adresseFacturation): self
    {
        $this->adresseFacturation = $adresseFacturation;

        return $this;
    }

    public function getPayement(): ?string
    {
        return $this->payement;
    }

    public function setPayement(string $payement): self
    {
        $this->payement = $payement;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

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

    /**
     * @return Collection<int, BonLivraison>
     */
    public function getBonLivraisons(): Collection
    {
        return $this->bonLivraisons;
    }

    public function addBonLivraison(BonLivraison $bonLivraison): self
    {
        if (!$this->bonLivraisons->contains($bonLivraison)) {
            $this->bonLivraisons->add($bonLivraison);
            $bonLivraison->setCommandeReference($this);
        }

        return $this;
    }

    public function removeBonLivraison(BonLivraison $bonLivraison): self
    {
        if ($this->bonLivraisons->removeElement($bonLivraison)) {
            // set the owning side to null (unless already changed)
            if ($bonLivraison->getCommandeReference() === $this) {
                $bonLivraison->setCommandeReference(null);
            }
        }

        return $this;
    }

    public function getCommandeFacture(): ?Facture
    {
        return $this->commandeFacture;
    }

    public function setCommandeFacture(?Facture $commandeFacture): self
    {
        $this->commandeFacture = $commandeFacture;

        return $this;
    }

}
