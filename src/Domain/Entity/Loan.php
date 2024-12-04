<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoanRepository::class)]
class Loan extends AbstractEntity
{
    #[ORM\OneToMany(mappedBy: 'loan', targetEntity: Installment::class, cascade: ['persist', 'remove'])]
    private $installments;

    public function __construct(
        #[ORM\Column(type: 'integer')]
        private $amount,
        #[ORM\Column(type: 'float')]
        private $rate,
        #[ORM\Column(type: 'integer')]
        private $installmentsPerYear,
    ) {
        parent::__construct();

        $this->installments = new ArrayCollection();
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;
        return $this;
    }

    public function getInstallmentsPerYear(): int
    {
        return $this->installmentsPerYear;
    }

    public function setInstallmentsPerYear(int $installmentsPerYear): self
    {
        $this->installmentsPerYear = $installmentsPerYear;
        return $this;
    }

    /**
     * @return Collection|Installment[]
     */
    public function getInstallmentsList(): Collection
    {
        return $this->installments;
    }

    public function addInstallment(Installment $installment): self
    {
        if (!$this->installments->contains($installment)) {
            $this->installments[] = $installment;
            $installment->setLoan($this);
        }

        return $this;
    }

    public function removeInstallment(Installment $installment): self
    {
        if ($this->installments->removeElement($installment)) {
            if ($installment->getLoan() === $this) {
                $installment->setLoan(null);
            }
        }

        return $this;
    }
}
