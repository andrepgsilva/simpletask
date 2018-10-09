<?php

$config = require 'config.php';
require 'helpers.php';
require 'Connection.php';

$pdo = Connection::connect($config);