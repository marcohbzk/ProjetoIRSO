<?php

define('TOKEN', 'ProjetoCRI');

require 'http_validation.php';

header('Content-Type: text/html; charset=utf-8');

$token = $_GET['access-token'];

if (!isset($token)) {
    echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No access-token was given'); // Bad Request
    exit;
}

if (!verifyHashedPassword($token)) {
    echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 401, 'Invalid access-token'); // Unauthorized
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = $_POST;


    if (!isset($request['context'])) {
        echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No context was given'); // Bad request
        exit;
    }


    if ($request['context'] == 'global') {
        if (!isset($request['date'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No date value was given'); // Bad request
            exit;
        }
        if (!isset($request['temperature'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No temperature value was given'); // Bad request
            exit;
        }
        if (!isset($request['humidity'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No humidity value was given'); // Bad request
            exit;
        }
        if (!isset($request['wind_turbine'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No wind_turbine value was given'); // Bad request
            exit;
        }
        if (!isset($request['wind'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No wind value was given'); // Bad request
            exit;
        }
        file_put_contents('../files/' . $request['context'] . '/temperature.txt', $request['temperature']);
        file_put_contents('../files/' . $request['context'] . '/humidity.txt', $request['humidity']);
        file_put_contents('../files/' . $request['context'] . '/wind_turbine.txt', $request['wind_turbine']);
        file_put_contents('../files/' . $request['context'] . '/wind.txt', $request['wind']);
        file_put_contents('../files/logs/sensores.txt', $request['date'] . ';' . $request['temperature'] . ';' . $request['humidity'] . ';' . $request['wind_turbine'] . ';' . $request['wind'] . PHP_EOL, FILE_APPEND);
        echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 200, 'Success'); // OK
    } elseif (str_contains($request['context'], 'track')) {
        if (!isset($request['action'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No sensor was given'); // Bad request
            exit;
        }
        if (!isset($request['value'])) {
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No value was given'); // Bad request
            exit;
        }

        if ($request['action'] == 'reset') {
            file_put_contents('../files/' . $request['context'] . '/recordTime.txt', 80);
            file_put_contents('../files/logs/' . $request['context'] . '.txt', "");
            file_put_contents('../files/' . $request['context'] . '/latestTime.txt', "0");
            file_put_contents('../files/' . $request['context'] . '/localTime.txt', "");
            echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 200, 'Success'); // OK
            exit;
        }

        file_put_contents('../files/' . $request['context'] . '/' . $request['action'] . '.txt', $request['value']);

        if ($request['value'] == "false") {
            if (file_get_contents('../files/' . $request['context'] . '/localTime.txt') == "") {
                $start = microtime(true);
                file_put_contents('../files/' . $request['context'] . '/localTime.txt', $start);
            }
        } else if ($request['value'] == "true") {
            $start = file_get_contents('../files/' . $request['context'] . '/localTime.txt');
            if (!empty($start)) {
                $end = microtime(true);
                $lapTime = round($end - $start, 2);
                file_put_contents('../files/' . $request['context'] . '/latestTime.txt', $lapTime);
                file_put_contents('../files/' . $request['context'] . '/localTime.txt', "");
                file_put_contents('../files/logs/' . $request['context'] . '.txt', $request['date'] . ';' . $lapTime . PHP_EOL, FILE_APPEND);
                if ($lapTime < file_get_contents('../files/' . $request['context'] . '/recordTime.txt'))
                    file_put_contents('../files/' . $request['context'] . '/recordTime.txt', $lapTime);
            }
        }

        echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 200, 'Success'); // OK
    } else
        echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No context was found'); // OK

    exit;
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $request = $_GET;

    if (!isset($request['action'])) {
        echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No action was given'); // Bad Request
        exit;
    }

    if (!isset($request['context'])) {
        echo returnHTTPStatus($request, $_SERVER['REQUEST_METHOD'], 400, 'No context was given'); // Bad Request
        exit;
    }
    echo $request['action'] . '|' . file_get_contents('../files/' . $request['context'] . '/' . $request['action'] . ".txt");
}
