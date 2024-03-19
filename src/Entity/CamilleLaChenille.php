<?php

namespace App\Entity;

use App\Repository\CamilleLaChenilleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CamilleLaChenilleRepository::class)]
class CamilleLaChenille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $rate = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column]
    private ?int $idMovie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getIdMovie(): ?int
    {
        return $this->idMovie;
    }

    public function setIdMovie(int $idMovie): static
    {
        $this->idMovie = $idMovie;

        return $this;
    }

    
}
