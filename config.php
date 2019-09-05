<?php

define("BASE_URL", "http://localhost/esqueci_a_senha/");
$config = [
    'dbname' => 'projeto_esqueci_a_senha',
    'host' => 'localhost',
    'dbuser' => 'root',
    'dbpass' => 'root'
];

global $db;
try {
    $db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    throw new $erro->getMessage();
}
