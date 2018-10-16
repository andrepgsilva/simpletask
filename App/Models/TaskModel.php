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

    public function finish($id) 
    {
        return App::get('database')->insert(
            'task',
            ['id', 'completed'],
            //1 to finished tasks
            [htmlspecialchars($id), 1]
        );
    }

    public function unfinished($id) 
    {
        return App::get('database')->insert(
            'task',
            ['id', 'completed'],
            //1 to finished tasks
            [htmlspecialchars($id), 0]
        );
    }

    public function delete($id) 
    {
        return App::get('database')->delete('task', $id);
    }

    public function load()
    {
        return App::get('database')->findAll('task');
    }    
}