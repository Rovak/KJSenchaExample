<?php

namespace Application;

use KJSencha\Frontend as Ext;

class Module
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/config/services.config.php';
    }

    /**
     * @return array
     */
    public function getComponentConfig()
    {
        return array(
            'factories' => array(
                'TestComponent' => function($sm) {
                    return new Ext\Panel(array(
                        'title' => 'Test Component'
                    ));
                }
            )
        );
    }

}
