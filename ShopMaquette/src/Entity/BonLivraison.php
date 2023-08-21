<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BonLivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonLivraisonRepository::class)]
#[ApiResource]
class BonLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\ManyToOne(inversedBy: 'bonLivraisons')]
    private ?Commande $commandeReference = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    public function getCommandeReference(): ?Commande
    {
        return $this->commandeReference;
    }

    public function setCommandeReference(?Commande $commandeReference): self
    {
        $this->commandeReference = $commandeReference;

        return $this;
    }
}
