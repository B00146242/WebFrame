<?php

namespace App\Repository;

use App\Entity\ClientProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClientProfile>
 *
 * @method ClientProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientProfile[]    findAll()
 * @method ClientProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientProfile::class);
    }

    /**
     * @return ClientProfile[] Returns an array of ClientProfile objects
     */
    public function findByUser(User $user): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
        //    ->orderBy('c.id', 'ASC')

            ->getQuery()
            ->getResult()
        ;
    }


}
