<?php

namespace App\Repository\Bike;

use App\Entity\Bike\Bicycle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bicycle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bicycle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bicycle[]    findAll()
 * @method Bicycle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BicycleRepository extends ServiceEntityRepository
{
    /**
     * BrandRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bicycle::class);
    }
}
