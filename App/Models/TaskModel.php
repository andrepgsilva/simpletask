<?php
namespace App\Models;
use \Core\App;

class TaskModel 
{
    public function save() 
    {
        return App::get('database')->insert(
            'task',
            ['description', 'completed'],
            //0 to unfinished tasks
            [htmlspecialchars($_POST['taskfield']), 0]
        );
    }

    public function load()
    {
        return App::get('database')->findAll('task');
    }    
}