<?php

namespace SimpleSearch\Search\Response;

use SimpleSearch\Search\Model\User;

class JsonResponse implements ResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function process($result)
    {
        $result = array_map(
            function ($result) {
                /** @var User $result */
                return $result->toArray();
            },
            $result
        );

        return json_encode($result);
    }
}
