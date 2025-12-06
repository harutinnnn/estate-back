<?php

$cities = $_POST['cities'];
$tmpCities = [];


$lang = 'hy';
if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];
}

foreach ($cities as $city) {

    if (!is_string($city)) {

        $tmpCities[$city['id']] = [
            'id' => $city['id'],
            'title' => $city['title'],
            'nodes' => []
        ];

        foreach ($city['nodes'] as $node) {
            if (!is_string($node)) {
                $tmpCities[$city['id']]['nodes'][] = $node;
            }
        }
    }
}


file_put_contents('./cities_' . $lang . '.json', json_encode($tmpCities));

var_dump($tmpCities);