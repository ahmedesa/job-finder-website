<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\ORM\EntityRepository;

class JobRepository extends EntityRepository
{
    /**
     * @param int|null $categoryId
     *
     * @return Job[]
     */
    public function findActiveJobs(int $categoryId = null)
    {
        $query_builder = $this->createQueryBuilder('j')
            ->where('j.expiresAt > :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('j.expiresAt', 'DESC');
        if ($categoryId) {
            $query_builder->andWhere('j.category = :categoryId')
                ->setParameter('categoryId', $categoryId);
        }
        return $query_builder->getQuery()->getResult();
    }

    /**
     * @param int $id
     *
     * @return Job|null
     */
    public function findActiveJob(int $id):  ? Job
    {
        return $this->createQueryBuilder('j')
            ->where('j.id = :id')
            ->andWhere('j.expiresAt > :date')
            ->setParameter('id', $id)
            ->setParameter('date', new \DateTime())
            ->getQuery()
            ->getOneOrNullResult();
    }
}
