<?php

namespace App\Entity;

use App\Repository\DrinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrinkRepository::class)
 */
class Drink
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Drunk::class, mappedBy="drinkid")
     */
    private $drunks;

    public function __construct()
    {
        $this->drunks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Drunk[]
     */
    public function getDrunks(): Collection
    {
        return $this->drunks;
    }

    public function addDrunk(Drunk $drunk): self
    {
        if (!$this->drunks->contains($drunk)) {
            $this->drunks[] = $drunk;
            $drunk->setDrinkid($this);
        }

        return $this;
    }

    public function removeDrunk(Drunk $drunk): self
    {
        if ($this->drunks->contains($drunk)) {
            $this->drunks->removeElement($drunk);
            // set the owning side to null (unless already changed)
            if ($drunk->getDrinkid() === $this) {
                $drunk->setDrinkid(null);
            }
        }

        return $this;
    }
}
