<?php
//Define all Routes HERE!

return [
    'GET' => 
    [
        'simpletask' => 'Page@home',
        'simpletask/contact' => 'Page@contact',
        'simpletask/task/show' => 'Task@show'
    ],
    'POST' => 
    [
        'simpletask/task/store' => 'Task@store'
    ]
];