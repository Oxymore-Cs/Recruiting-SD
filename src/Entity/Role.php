<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Roster>
     */
    #[ORM\ManyToMany(targetEntity: Roster::class, mappedBy: 'roles')]
    private Collection $rosters;

    public function __construct()
    {
        $this->rosters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

   /**
 * @return Collection<int, Roster>
 */
public function getRosters(): Collection
{
    return $this->rosters;
}

public function addRoster(Roster $roster): static
{
    if (!$this->rosters->contains($roster)) {
        $this->rosters->add($roster);
        $roster->addRole($this);
    }

    return $this;
}

public function removeRoster(Roster $roster): static
{
    if ($this->rosters->removeElement($roster)) {
        $roster->removeRole($this);
    }

    return $this;
}

public function __toString(): string
{
    return $this->name;
}
}
