<?php

namespace Core;
use Core\Database\{QueryBuilder, Connection};

App::bind('config', require_once('config.php'));

App::bind('database', (new QueryBuilder(
        Connection::connect(App::get('config'))
    ))
);