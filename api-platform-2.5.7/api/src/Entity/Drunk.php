<?php

namespace App\Entity;

use App\Repository\DrunkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrunkRepository::class)
 */
class Drunk
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="drunks")
     */
    private $userid;

    /**
     * @ORM\ManyToOne(targetEntity=drink::class, inversedBy="drunks")
     */
    private $drinkid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getDrinkid(): ?drink
    {
        return $this->drinkid;
    }

    public function setDrinkid(?drink $drinkid): self
    {
        $this->drinkid = $drinkid;

        return $this;
    }
}
