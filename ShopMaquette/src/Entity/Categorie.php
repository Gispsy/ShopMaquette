<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\Collection;

//Vich need package qui permet de sauvegarder les image
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[Vich\Uploadable]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[UploadableField(mapping: 'categorie_image', fileNameProperty: 'image')]
    private ?File $imageFile = null;
    
    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: SousCategorie::class)]
    private Collection $souscategorie;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    public function __construct()
    {
        $this->souscategorie = new ArrayCollection();
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

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

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
