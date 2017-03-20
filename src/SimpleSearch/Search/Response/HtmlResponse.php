<?php

namespace SimpleSearch\Search\Response;


class HtmlResponse implements ResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function process($result)
    {
        $view = !empty($result[0]) ? $result[0]->__toString() . '/' : '';
        $template = $this->getTwig()->load($view . 'list.html.twig');

        return $template->render(array('result' => $result));
    }

    private function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../Resources/Views');
        return new \Twig_Environment($loader);
    }
}
