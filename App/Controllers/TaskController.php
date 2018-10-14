<?php

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
}