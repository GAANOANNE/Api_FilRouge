<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=GroupTag::class, mappedBy="tag")
     */
    private $groupTags;

    public function __construct()
    {
        $this->groupTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    /**
     * @return Collection|GroupTag[]
     */
    public function getGroupTags(): Collection
    {
        return $this->groupTags;
    }

    public function addGroupTag(GroupTag $groupTag): self
    {
        if (!$this->groupTags->contains($groupTag)) {
            $this->groupTags[] = $groupTag;
            $groupTag->addTag($this);
        }

        return $this;
    }

    public function removeGroupTag(GroupTag $groupTag): self
    {
        if ($this->groupTags->removeElement($groupTag)) {
            $groupTag->removeTag($this);
        }

        return $this;
    }
}
