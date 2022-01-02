<?php

namespace App\Entity;

use App\Repository\WebsiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebsiteRepository::class)]
class Website
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $homepage_url;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'websites')]
    #[ORM\JoinColumn(nullable: false)]
    private $client_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomepageUrl(): ?string
    {
        return $this->homepage_url;
    }

    public function setHomepageUrl(string $homepage_url): self
    {
        $this->homepage_url = $homepage_url;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }
}
