<?php

namespace App\Repository;

use App\Entity\Classe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classe::class);
    }

    public function findClassesWithInscriptionsCount(string $anneeAcademique): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.inscriptions', 'i')
            ->addSelect('COUNT(i.id) AS inscriptions_count')
            ->andWhere('i.anneacademique = :anneeAcademique')
            ->setParameter('anneeAcademique', $anneeAcademique)
            ->groupBy('c.id')
            ->getQuery()
            ->getArrayResult(); // Utilisez getArrayResult() pour obtenir un tableau associatif
    }
}
