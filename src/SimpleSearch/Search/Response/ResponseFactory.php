<?php

namespace SimpleSearch\Search\Response;

use SimpleSearch\Search\Handler\SearchHandler;

class ResponseFactory
{
    public static function create($format = '')
    {
        if ($format === SearchHandler::FORMAT_JSON) {
            return new JsonResponse();
        }

        return new HtmlResponse();
    }
}
