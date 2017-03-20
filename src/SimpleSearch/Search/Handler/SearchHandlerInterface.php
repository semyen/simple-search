<?php

namespace SimpleSearch\Search\Handler;

interface SearchHandlerInterface
{
    /**
     * @param array $arguments
     * @param array $options
     */
    public function __construct($arguments, $options);

    /**
     * @return string
     */
    public function getResponse();
}
