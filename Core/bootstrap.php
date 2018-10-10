<?php

$config = require_once(dirname(__DIR__) . '/config.php');
require_once 'helpers.php';
require_once 'Database/Connection.php';
require_once 'Database/QueryBuilder.php';

$pdo = Connection::connect($config);

if ( isset($_POST['taskfield']) ) {
    $insertQuery = (new QueryBuilder($pdo))->insert(
        'task',
        ['description', 'completed'],
        [$_POST['taskfield'], 0]
    );
    header('Location: ../index.php');
}

return $all_tasks = (new QueryBuilder($pdo))->findAll('task');