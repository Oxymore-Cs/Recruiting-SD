<?php

namespace App\Entity;

use App\Repository\RoundsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundsRepository::class)]
class Rounds
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Matches $game = null;

    #[ORM\ManyToOne(inversedBy: 'rounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Map $map = null;

    #[ORM\Column]
    private ?int $round_number = null;

    #[ORM\Column]
    private ?int $score_team_a = null;

    #[ORM\Column]
    private ?int $score_team_b = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGame(): ?Matches
    {
        return $this->game;
    }

    public function setGame(?Matches $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getMap(): ?Map
    {
        return $this->map;
    }

    public function setMap(?Map $map): static
    {
        $this->map = $map;

        return $this;
    }

    public function getRoundNumber(): ?int
    {
        return $this->round_number;
    }

    public function setRoundNumber(int $round_number): static
    {
        $this->round_number = $round_number;

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
}
