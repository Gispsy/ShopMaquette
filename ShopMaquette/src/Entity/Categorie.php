<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: SousCategorie::class)]
    private Collection $souscategorie;

    public function __construct()
    {
        $this->souscategorie = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
            $souscategorie->setCategorie($this);
        }

        return $this;
    }

    public function removeSouscategorie(SousCategorie $souscategorie): self
    {
        if ($this->souscategorie->removeElement($souscategorie)) {
            // set the owning side to null (unless already changed)
            if ($souscategorie->getCategorie() === $this) {
                $souscategorie->setCategorie(null);
            }
        }

        return $this;
    }

}
