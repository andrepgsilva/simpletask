<?php

class PageController 
{
    public function home() {
        require 'Views/index.view.php';
    }

    public function contact() {
        require 'Views/contact.view.php';
    }
}
