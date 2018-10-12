<?php

$config = require_once('config.php');
require_once 'helpers.php';

$pdo = Connection::connect($config);

if ( isset($_POST['taskfield']) ) {
    $insertQuery = (new QueryBuilder($pdo))->insert(
        'task',
        ['description', 'completed'],
        //0(false) to unfinished tasks
        [htmlspecialchars($_POST['taskfield']), 0]
    );
    header('Location: ../index.php');
}

return $all_tasks = (new QueryBuilder($pdo))->findAll('task');