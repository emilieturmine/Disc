<?php

namespace App\Entity;

use App\Repository\DisqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisqueRepository::class)]
class Disque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: "/^[a-z]+$/i",
        htmlPattern: '^[a-zA-Z]+$'
    )]
    private $titre;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: ' ^(19|20)\d{2}$
        ',
        htmlPattern: ' ^(19|20)\d{2}$
        '
    )]
    private $Annee;



    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $picture;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $label;


    #[ORM\ManyToOne(targetEntity: Artiste::class)]
    private $Artiste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->Annee;
    }

    public function setAnnee(int $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->Artiste;
    }

    public function setArtiste(?Artiste $Artiste): self
    {
        $this->Artiste = $Artiste;

        return $this;
    }
}
