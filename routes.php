<?php
//Define all Routes HERE!

return [
    'GET' => 
    [
        'simpletask' => 'Page@home',
        'simpletask/contact' => 'Page@contact',
        'simpletask/task/show' => 'Task@show',
        'simpletask/task/finish' => 'Task@finish',
        'simpletask/task/unfinished' => 'Task@unfinished',
        'simpletask/task/delete' => 'Task@delete'
    ],
    'POST' => 
    [
        'simpletask/task/store' => 'Task@store'
    ]
];