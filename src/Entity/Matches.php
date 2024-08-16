<?php

namespace App\Entity;

use App\Repository\MatchesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchesRepository::class)]
class Matches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $team_a = null;

    #[ORM\Column(length: 255)]
    private ?string $team_b = null;

    #[ORM\Column(nullable: true)]
    private ?int $score_team_a = null;

    #[ORM\Column(nullable: true)]
    private ?int $score_team_b = null;

    #[ORM\ManyToOne(inversedBy: 'matches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BoFormat $bo_format = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $match_date = null;

    #[ORM\ManyToOne(inversedBy: 'matches')]
    private ?Tournament $tournament = null;

    /**
     * @var Collection<int, Rounds>
     */
    #[ORM\OneToMany(targetEntity: Rounds::class, mappedBy: 'game')]
    private Collection $rounds;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_team_a = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_team_b = null;

    public function __construct()
    {
        $this->rounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamA(): ?string
    {
        return $this->team_a;
    }

    public function setTeamA(string $team_a): static
    {
        $this->team_a = $team_a;

        return $this;
    }

    public function getTeamB(): ?string
    {
        return $this->team_b;
    }

    public function setTeamB(string $team_b): static
    {
        $this->team_b = $team_b;

        return $this;
    }

    public function getScoreTeamA(): ?int
    {
        return $this->score_team_a;
    }

    public function setScoreTeamA(int $score_team_a): static
    {
        $this->score_team_a = $score_team_a;

        return $this;
    }

    public function getScoreTeamB(): ?int
    {
        return $this->score_team_b;
    }

    public function setScoreTeamB(int $score_team_b): static
    {
        $this->score_team_b = $score_team_b;

        return $this;
    }

    public function getBoFormat(): ?BoFormat
    {
        return $this->bo_format;
    }

    public function setBoFormat(?BoFormat $bo_format): static
    {
        $this->bo_format = $bo_format;

        return $this;
    }

    public function getMatchDate(): ?\DateTimeInterface
    {
        return $this->match_date;
    }

    public function setMatchDate(?\DateTimeInterface $match_date): static
    {
        $this->match_date = $match_date;

        return $this;
    }

    public function getTournament(): ?Tournament
    {
        return $this->tournament;
    }

    public function setTournament(?Tournament $tournament): static
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * @return Collection<int, Rounds>
     */
    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function addRound(Rounds $round): static
    {
        if (!$this->rounds->contains($round)) {
            $this->rounds->add($round);
            $round->setGame($this);
        }

        return $this;
    }

    public function removeRound(Rounds $round): static
    {
        if ($this->rounds->removeElement($round)) {
            // set the owning side to null (unless already changed)
            if ($round->getGame() === $this) {
                $round->setGame(null);
            }
        }

        return $this;
    }

    public function getImageTeamA(): ?string
    {
        return $this->image_team_a;
    }

    public function setImageTeamA(?string $image_team_a): static
    {
        $this->image_team_a = $image_team_a;

        return $this;
    }

    public function getImageTeamB(): ?string
    {
        return $this->image_team_b;
    }

    public function setImageTeamB(?string $image_team_b): static
    {
        $this->image_team_b = $image_team_b;

        return $this;
    }

    public function __toString(): string
    {
        return $this->team_a . ' vs ' . $this->team_b;
    }
}
