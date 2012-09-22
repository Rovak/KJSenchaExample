<?php

use Zend\Loader\AutoloaderFactory;
use Zend\Mvc\Application;

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

require_once 'vendor/zf2/library/Zend/Loader/AutoloaderFactory.php';

AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        'autoregister_zf' => true,
        'namespaces' => array(
            'Doctrine\Common' => 'vendor/common/lib/Doctrine/Common',
        )
    )
));

Application::init(include __DIR__ . '/../config/application.config.php')->run();
