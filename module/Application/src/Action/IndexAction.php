<?php

namespace Application\Action;

use RkaZf2Action\AbstractAction;
use Zend\View\Model\ViewModel;

class IndexAction extends AbstractAction
{
    public function __invoke($request, $response)
    {
        return new ViewModel();
    }
}
