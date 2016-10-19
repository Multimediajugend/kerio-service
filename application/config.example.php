<?php

$config['displayErrorDetails'] = true;

$config['logger']['name'] = 'kerio-service';
$config['logger']['level'] = Monolog\Logger::DEBUG;
$config['logger']['path'] = dirname(__DIR__) . '/logs/app.log';

$config['kerio']['host']   = "192.168.2.111";
$config['kerio']['user']   = "admin";
$config['kerio']['pass']   = "*****";
$config['kerio']['servicename'] = "KerioService";
$config['kerio']['serviceorganization'] = "Multimediale Jugendarbeit Sachsen e.V.";
$config['kerio']['serviceversion'] = "1.0";
