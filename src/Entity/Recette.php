<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 */
class Recette
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomRecette;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DescriptionRecette;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NbPersonne;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sold;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRecette(): ?string
    {
        return $this->NomRecette;
    }

    public function setNomRecette(?string $NomRecette): self
    {
        $this->NomRecette = $NomRecette;

        return $this;
    }
public function getSlug():string
{
  return (new Slugify())->slugify($this->NomRecette);

}

    public function getDescriptionRecette(): ?string
    {
        return $this->DescriptionRecette;
    }

    public function setDescriptionRecette(?string $DescriptionRecette): self
    {
        $this->DescriptionRecette = $DescriptionRecette;

        return $this;
    }

    
    public function getNbPersonne(): ?string
    {
        return $this->NbPersonne;
    }

    public function setNbPersonne(?string $NbPersonne): self
    {
        $this->NbPersonne = $NbPersonne;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }
}
