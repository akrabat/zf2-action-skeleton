<?php

namespace Application\Factory;

use Application\Action\IndexAction;

class IndexActionFactory
{
    public function __invoke($sm)
    {
        return new IndexAction();
    }
}
