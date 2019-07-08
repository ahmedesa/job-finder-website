<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Job;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;


class JobRepository extends EntityRepository
{
    /**
     * get all active jops
     *
     * @param int|null $categoryId
     *
     * @return Job[]
     */
    public function findActiveJobs(int $categoryId = null)
    {
        $query_builder = $this->createQueryBuilder('j')
            ->where('j.expiresAt > :date')
            ->andWhere('j.activated = :activated')
            ->setParameter('date', new \DateTime())
            ->setParameter('activated', true)
            ->orderBy('j.expiresAt', 'DESC');
        if ($categoryId) {
            $query_builder->andWhere('j.category = :categoryId')
                ->setParameter('categoryId', $categoryId);
        }
        return $query_builder->getQuery()->getResult();
    }

    /**
     * find job byid (depend on if the job is active if not return null)
     * @param int $id
     *
     * @throws NonUniqueResultException
     *
     * @return Job|null
     */
    public function findActiveJob(int $id):  ? Job
    {
        return $this->createQueryBuilder('j')
            ->where('j.id = :id')
            ->andWhere('j.expiresAt > :date')
            ->andWhere('j.activated = :activated')
            ->setParameter('id', $id)
            ->setParameter('date', new \DateTime())
            ->setParameter('activated', true)
            ->getQuery()
            ->getOneOrNullResult();
    }
    /**
    * @param Category $category
    * @return AbstractQuery
    */
    public function getPaginatedActiveJobsByCategoryQuery(Category $category) : AbstractQuery
    {
     return $this->createQueryBuilder('j')
            ->where('j.category = :category')
            ->andWhere('j.expiresAt > :date')
            ->andWhere('j.activated = :activated')
            ->setParameter('category', $category)
            ->setParameter('date', new \DateTime())
            ->setParameter('activated', true)
            ->getQuery();
    }
}
