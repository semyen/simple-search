<?php

namespace SimpleSearch\Search\Handler;

use SimpleSearch\Search\Response\ResponseFactory;
use SimpleSearch\Search\Response\ResponseInterface;

abstract class SearchHandler implements SearchHandlerInterface
{
    const OPTION_FORMAT = 'format';

    const FORMAT_JSON = 'json';
    const FORMAT_HTML = 'html';

    /**
     * @var string
     */
    protected $format;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $arguments;

    /**
     * @var array
     */
    protected $result;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @param array $arguments
     * @param array $options
     */
    public function __construct($arguments, $options)
    {
        $this->format = !empty($options[self::OPTION_FORMAT]) ? $options[self::OPTION_FORMAT] : '';
        $this->arguments = $this->prepareArguments($arguments);
        $this->options = $options;
        $this->response = ResponseFactory::create($this->format);

        $this->parseArguments();
    }

    /**
     * @return array
     */
    abstract protected function process();

    abstract protected function parseArguments();

    /**
     * @param $arguments
     * @return array
     */
    private function prepareArguments($arguments)
    {
        if ($this->format === self::FORMAT_JSON) {
            $arguments = array_map(
                function ($argument) {
                    return json_decode($argument, true);
                },
                $arguments
            );

            foreach (new \ArrayObject($arguments) as $argument) {
                if (is_array($argument)) {
                    $arguments = array_merge($arguments, $argument);
                }
            }
        }

        return $arguments;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        $this->process();

        return $this->response->process($this->result);
    }
}
