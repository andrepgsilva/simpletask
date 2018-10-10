<?php

$config = require_once 'config.php';
require_once 'helpers.php';
require_once 'Connection.php';
require_once 'QueryBuilder.php';

$pdo = Connection::connect($config);

if ( isset($_POST['taskfield']) ) {
    $insertQuery = (new QueryBuilder($pdo))->insert(
        'task',
        ['description', 'completed'],
        [$_POST['taskfield'], 0]
    );
    header('Location: index.view.php');
}

return (new QueryBuilder($pdo))->findAll('task');