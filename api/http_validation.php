<?php
function verifyHashedPassword($token)
{
    return ($token == md5(TOKEN));
}
function returnHTTPStatus($request, $method, $status, $message)
{
    // writes to log file
    if ($status != 200) {
        $log = $method . ';';

        foreach ($request as $item) {
            $log .= $item . ';';
        }
        $log .= date('Y/m/d H:i');

        file_put_contents("../files/logs/http_errors.log",  $log . PHP_EOL, FILE_APPEND);
    }


    // returns the error code
    http_response_code($status);
    return json_encode(['code' => http_response_code(), 'message' => $message]);
}
