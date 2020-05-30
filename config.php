<?php

$dsn = 'mysql:dbname=imdb;host=learn.jamiekohns.dev';
$user = 'class';
$password = 'bdpa-hscc';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Cannot connect to database!');
}
