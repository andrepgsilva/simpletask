<?php
namespace App\Controllers;
use App\Models\TaskModel;

class TaskController
{
    public function show() 
    {
        $all_tasks = (new TaskModel())->load();
        //Wrap variable for pass to view
        view('tasks', compact('all_tasks'));
    }

    public function store()
    {
        (new TaskModel())->save();
        redirectTo('simpletask');
    }

    public function finish($params) 
    {
        (new TaskModel())->finish($params['id']);
        redirectTo('/simpletask/task/show');
    }

    public function unfinished($params) 
    {
        (new TaskModel())->unfinished($params['id']);
        redirectTo('/simpletask/task/show');
    }

    public function delete($params)
    {
        (new TaskModel())->delete($params['id']);
        redirectTo('/simpletask/task/show');
    }
}