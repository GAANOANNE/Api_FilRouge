<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 * @ApiResource()
 */
class Apprenant extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=ProfilDeSortie::class, mappedBy="apprenant")
     */
    private $profilDeSortie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    public function __construct()
    {
        $this->profilDeSortie = new ArrayCollection();
    }


    /**
     * @return Collection|ProfilDeSortie[]
     */
    public function getProfilDeSortie(): Collection
    {
        return $this->profilDeSortie;
    }

    public function addProfilDeSortie(ProfilDeSortie $profilDeSortie): self
    {
        if (!$this->profilDeSortie->contains($profilDeSortie)) {
            $this->profilDeSortie[] = $profilDeSortie;
            $profilDeSortie->setApprenant($this);
        }

        return $this;
    }

    public function removeProfilDeSortie(ProfilDeSortie $profilDeSortie): self
    {
        if ($this->profilDeSortie->removeElement($profilDeSortie)) {
            // set the owning side to null (unless already changed)
            if ($profilDeSortie->getApprenant() === $this) {
                $profilDeSortie->setApprenant(null);
            }
        }

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

}
