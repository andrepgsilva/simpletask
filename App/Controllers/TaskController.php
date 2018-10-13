<?php

class TaskController
{
    public function show() 
    {
        $all_tasks = App::get('database')->findAll('task');
        require 'Views/tasks.view.php';
    }

    public function store()
    {
        App::get('database')->insert(
            'task',
            ['description', 'completed'],
            //0(false) to unfinished tasks
            [htmlspecialchars($_POST['taskfield']), 0]
        );
        return $this->show();
    }
}