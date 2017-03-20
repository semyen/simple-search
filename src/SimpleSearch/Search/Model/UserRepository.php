<?php

namespace SimpleSearch\Search\Model;

use Doctrine\ORM\EntityRepository;

class UserRepository extends Repository
{
    /**
     * @param string $lastName
     * @return array
     */
    public function findByLastName($lastName = '%')
    {
        return $this->getRepository()->createQueryBuilder('t')
            ->where('t.lastName like :lastName')
            ->setParameter('lastName', $lastName . '%')
            ->orderBy('t.lastName')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return EntityRepository
     */
    protected function getRepository()
    {
        return self::getEntityManager()->getRepository(User::class);
    }
}
