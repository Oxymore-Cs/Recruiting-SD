<?php

namespace App\Entity;

use App\Repository\RosterRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: RosterRepository::class)]
class Roster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Role::class, inversedBy: 'rosters')]
    #[ORM\JoinTable(name: 'roster_roles')]
    private Collection $roles;
    
    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }
    

    #[ORM\Column(length: 255)]
    private ?string $profile_picture = null;

    #[ORM\Column(nullable: true)]
    private ?bool $substitute = null;

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
 * @return Collection<int, Role>
 */
public function getRoles(): Collection
{
    return $this->roles;
}

public function addRole(Role $role): static
{
    if (!$this->roles->contains($role)) {
        $this->roles->add($role);
    }

    return $this;
}

public function removeRole(Role $role): static
{
    $this->roles->removeElement($role);

    return $this;
}
    

    public function getProfilePicture(): ?string
    {
        return $this->profile_picture;
    }

    public function setProfilePicture(string $profile_picture): static
    {
        $this->profile_picture = $profile_picture;

        return $this;
    }

    public function isSubstitute(): ?bool
    {
        return $this->substitute;
    }

    public function setSubstitute(?bool $substitute): static
    {
        $this->substitute = $substitute;

        return $this;
    }
}
