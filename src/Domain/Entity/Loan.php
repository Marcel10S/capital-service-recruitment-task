<?php

namespace App\Domain\Entity;

use App\Infrastructure\Repository\LoanRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoanRepository::class)]
class Loan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $amount;

    #[ORM\Column(type: 'integer')]
    private $installments;

    #[ORM\Column(type: 'float')]
    private $interestRate;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'boolean', options: ["default" => false])]
    private $excluded = false;
}
