<?php

require_once 'helpers.php';

App::bind('config', require_once('config.php'));

App::bind('database', (new QueryBuilder(
        Connection::connect(App::get('config'))
    ))
);