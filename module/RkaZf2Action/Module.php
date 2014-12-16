<?php

namespace RkaZf2Action;

use Zend\Mvc\ModuleRouteListener;
use Zend\View\Model\ModelInterface as ViewModel;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $sharedEvents = $e->getApplication()->getEventManager()->getSharedManager();
        $sharedEvents->attach('Zend\Stdlib\DispatchableInterface', 'dispatch', array($this, 'renameTemplate'), -91);
    }

    /**
     * Remove "-action" from the end of the ViewModel's template name if it's there.
     *
     * Zend\Mvc\View\Http\InjectTemplateListener will inject the template name into
     * the ViewModel if one hasn't been set. However it will leave "-action" on the
     * end of the template name. This listener removes the "-action" as it's from
     * the Action class' name which we do not want to be in the template name.
     *
     * @param  MvcEvent $e
     * @return void
     */
    public function renameTemplate(MvcEvent $e)
    {
        $model = $e->getResult();
        if (!$model instanceof ViewModel) {
            return;
        }

        $template = $model->getTemplate();
        if (!empty($template)) {
            if ((7 < strlen($template))
                && ('-action' == substr($template, -7))
            ) {
                $template = substr($template, 0, -7);
            }
            $model->setTemplate($template);
        }
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
}
