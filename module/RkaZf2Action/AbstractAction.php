<?php

namespace RkaZf2Action;

use Zend\Mvc\Controller\AbstractController;
use Zend\Mvc\MvcEvent;

abstract class AbstractAction extends AbstractController
{
    /**
     * Execute the request
     *
     * @param  MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        $actionResponse = $this->__invoke($this->getRequest(), $this->getResponse());

        $e->setResult($actionResponse);

        return $actionResponse;
    }
}
