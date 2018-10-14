<?php
namespace App\Controllers;

class PageController 
{
    public function home() 
    {
        view('index');
    }

    public function contact() 
    {
        view('contact');
    }
}