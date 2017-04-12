<?php

namespace Application\Service;


class EarthquakeService {

    // example url  https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=2014-01-01&endtime=2014-01-02&minmagnitude=5

    private $basicUrl = "https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson";

    public function getTodayEarthquakes() {
        $today = new \DateTime('today');
        $tomorrow = new \DateTime('tomorrow');

        $url = $this->basicUrl . '&starttime=' . $today->format('Y-m-d') . '&endtime=' . $tomorrow->format('Y-m-d');

        $earthquakes = json_decode(file_get_contents($url));
        $resultEarthquakes = [];
        $count = 1;

        foreach ($earthquakes->features as $feature) {
            $resultEarthquakes[$count] = [
                'place' => $feature->properties->place,
                'mag' => $feature->properties->mag,
                'time' => date('Y-m-d H:i:s', substr($feature->properties->time, 0, 10))
            ];
            $count++;
        }

        return $resultEarthquakes;
    }


}

?>