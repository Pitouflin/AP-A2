<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prixtotal = null;


    #[ORM\Column]
    private ?int $totalFidelite = null;

    #[ORM\ManyToOne(inversedBy: 'lesCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $leClient = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'lesCommandes')]
    private Collection $produits;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixtotal(): ?float
    {
        return $this->prixtotal;
    }

    public function setPrixtotal(float $prixtotal): self
    {
        $this->prixtotal = $prixtotal;

        return $this;
    }

    
    public function getTotalFidelite(): ?int
    {
        return $this->totalFidelite;
    }

    public function setTotalFidelite(int $totalFidelite): self
    {
        $this->totalFidelite = $totalFidelite;

        return $this;
    }

    public function getLeClient(): ?User
    {
        return $this->leClient;
    }

    public function setLeClient(?User $leClient): self
    {
        $this->leClient = $leClient;

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
            $produit->addLesCommande($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeLesCommande($this);
        }

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }
}
