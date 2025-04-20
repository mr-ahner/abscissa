<?php
// ip logging :3 
// this is only for people who post, just so I can see who, don't post, don't get logged.
$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$ip = explode(',', $ip)[0]; // get first ip

$ipfile = fopen("log.txt", "a");
fwrite($ipfile, $ip . "\n");
fclose($ipfile);
?>