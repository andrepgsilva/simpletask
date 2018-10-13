<?php

class TaskController
{
    public function show() 
    {
        $all_tasks = App::get('database')->findAll('task');
        require 'Views/index.view.php';
    }
}