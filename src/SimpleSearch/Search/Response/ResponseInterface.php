<?php

namespace SimpleSearch\Search\Response;

interface ResponseInterface
{
    /**
     * @param array $result
     * @return string
     */
    public function process($result);
}
