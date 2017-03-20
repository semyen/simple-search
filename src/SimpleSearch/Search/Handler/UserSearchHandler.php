<?php

namespace SimpleSearch\Search\Handler;

use SimpleSearch\Search\Model\UserRepository;

class UserSearchHandler extends SearchHandler
{
    const ARGUMENT_LAST_NAME = 'last-name';

    /**
     * @var string
     */
    protected $lastName;

    protected function parseArguments()
    {
        $this->lastName = !empty($this->arguments[self::ARGUMENT_LAST_NAME]) ?
            $this->arguments[self::ARGUMENT_LAST_NAME] :
            '';
    }

    /**
     * @return array
     */
    protected function process()
    {
        $this->result = (new UserRepository())->findByLastName($this->lastName);
    }
}
