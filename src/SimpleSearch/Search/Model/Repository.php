<?php

namespace SimpleSearch\Search\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

abstract class Repository
{
    /**
     * @var EntityManager
     */
    private static $entityManager;

    /**
     * @return EntityManager|null
     */
    public static function getEntityManager()
    {
        if (self::$entityManager === null) {
            try {
                $dbParams = Yaml::parse(file_get_contents(__DIR__ . '/../../../../db.yml'));
            } catch (ParseException $e) {
                $dbParams = [];
            }

            $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../Model'], true, null, null, false);

            try {
                self::$entityManager = EntityManager::create($dbParams, $config);
            } catch (ORMException $e) {
            } catch (\InvalidArgumentException $e) {
            }
        }

        return self::$entityManager;
    }

    /**
     * @return EntityRepository
     */
    abstract protected function getRepository();
}
