<?php

namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EarthquakeControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $earthquakeService = $serviceLocator->getServiceLocator()->get('Application\Service\EarthquakeService');

        return new EarthquakeController(
            $earthquakeService
        );
    }

}
