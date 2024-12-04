<?php

namespace App\Domain\Entity;

use App\Repository\InstallmentRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: InstallmentRepository::class)]
class Installment extends AbstractEntity
{
    #[ORM\Column(type: 'boolean', options: ["default" => false])]
    private bool $excluded = false;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: Loan::class, inversedBy: 'installments')]
        #[ORM\JoinColumn(nullable: false)]
        private Loan $loan,
        #[ORM\Column(type: 'float', nullable: false)]
        private float $amount,
    ) {
        parent::__construct();
    }

    public function getLoan(): Loan
    {
        return $this->loan;
    }

    public function setLoan(Loan $loan): self
    {
        $this->loan = $loan;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }


    public function isExcluded(): bool
    {
        return $this->excluded;
    }

    public function setExcluded(bool $excluded): self
    {
        $this->excluded = $excluded;
        return $this;
    }
}
