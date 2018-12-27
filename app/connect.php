<?php

try {
    $config = require 'config/database.php';
    $sql = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}