<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\EarthquakeService;

class EarthquakeController extends AbstractActionController
{
    private $earthquakeService;

    public function __construct(
        EarthquakeService $earthquakeService
    ) {
        $this->earthquakeService = $earthquakeService;
    }

    public function indexAction()
    {
        return new ViewModel([
            'earthquakes' => $this->earthquakeService->getTodayEarthquakes(),
        ]);
    }
}
