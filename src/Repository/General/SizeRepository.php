<?php

namespace App\Repository\General;

use App\Entity\General\Size;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Size|null find($id, $lockMode = null, $lockVersion = null)
 * @method Size|null findOneBy(array $criteria, array $orderBy = null)
 * @method Size[]    findAll()
 * @method Size[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizeRepository extends ServiceEntityRepository
{
    /**
     * BrandRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Size::class);
    }
}
