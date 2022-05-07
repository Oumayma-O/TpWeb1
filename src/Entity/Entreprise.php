<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $designation;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Pfe::class)]
    private $Pfe;

    public function __construct()
    {
        $this->Pfe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection<int, Pfe>
     */
    public function getPfe(): Collection
    {
        return $this->Pfe;
    }

    public function addPfe(Pfe $pfe): self
    {
        if (!$this->Pfe->contains($pfe)) {
            $this->Pfe[] = $pfe;
            $pfe->setEntreprise($this);
        }

        return $this;
    }

    public function removePfe(Pfe $pfe): self
    {
        if ($this->Pfe->removeElement($pfe)) {
            // set the owning side to null (unless already changed)
            if ($pfe->getEntreprise() === $this) {
                $pfe->setEntreprise(null);
            }
        }

        return $this;
    }
}
