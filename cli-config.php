<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use SimpleSearch\Search\Model\Repository;

$entityManager = Repository::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
