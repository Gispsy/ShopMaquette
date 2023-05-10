<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $liens = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiens(): ?string
    {
        return $this->liens;
    }

    public function setLiens(?string $liens): self
    {
        $this->liens = $liens;

        return $this;
    }
}
