<?php

$config = require_once('config.php');
require_once 'helpers.php';

//App::bind('database', Connection::connect($config));
App::bind('database', (new QueryBuilder(
        Connection::connect($config)
    ))
);

if ( isset($_POST['taskfield']) ) {
    $insertQuery = (new QueryBuilder($pdo))->insert(
        'task',
        ['description', 'completed'],
        //0(false) to unfinished tasks
        [htmlspecialchars($_POST['taskfield']), 0]
    );
    header('Location: ../index.php');
}