<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $category = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $first_paragraph = null;

    #[ORM\Column(length: 255)]
    private ?string $first_image = null;

    #[ORM\Column(length: 255)]
    private ?string $second_title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $second_paragraph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $third_title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $third_paragraph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $second_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $third_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fourth_title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fourth_paragraph = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $publication_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?Categorie
    {
        return $this->category;
    }

    public function setCategory(?Categorie $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getFirstParagraph(): ?string
    {
        return $this->first_paragraph;
    }

    public function setFirstParagraph(string $first_paragraph): static
    {
        $this->first_paragraph = $first_paragraph;

        return $this;
    }

    public function getFirstImage(): ?string
    {
        return $this->first_image;
    }

    public function setFirstImage(string $first_image): static
    {
        $this->first_image = $first_image;

        return $this;
    }

    public function getSecondTitle(): ?string
    {
        return $this->second_title;
    }

    public function setSecondTitle(string $second_title): static
    {
        $this->second_title = $second_title;

        return $this;
    }

    public function getSecondParagraph(): ?string
    {
        return $this->second_paragraph;
    }

    public function setSecondParagraph(string $second_paragraph): static
    {
        $this->second_paragraph = $second_paragraph;

        return $this;
    }

    public function getThirdTitle(): ?string
    {
        return $this->third_title;
    }

    public function setThirdTitle(?string $third_title): static
    {
        $this->third_title = $third_title;

        return $this;
    }

    public function getThirdParagraph(): ?string
    {
        return $this->third_paragraph;
    }

    public function setThirdParagraph(?string $third_paragraph): static
    {
        $this->third_paragraph = $third_paragraph;

        return $this;
    }

    public function getSecondImage(): ?string
    {
        return $this->second_image;
    }

    public function setSecondImage(?string $second_image): static
    {
        $this->second_image = $second_image;

        return $this;
    }

    public function getThirdImage(): ?string
    {
        return $this->third_image;
    }

    public function setThirdImage(?string $third_image): static
    {
        $this->third_image = $third_image;

        return $this;
    }

    public function getFourthTitle(): ?string
    {
        return $this->fourth_title;
    }

    public function setFourthTitle(?string $fourth_title): static
    {
        $this->fourth_title = $fourth_title;

        return $this;
    }

    public function getFourthParagraph(): ?string
    {
        return $this->fourth_paragraph;
    }

    public function setFourthParagraph(?string $fourth_paragraph): static
    {
        $this->fourth_paragraph = $fourth_paragraph;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): static
    {
        $this->publication_date = $publication_date;

        return $this;
    }
}
