<?php

namespace frameData\controller;
include './view/Pages/Template.php';

use frameData\view\Template;

class HomeController{

    public function getHome(){
        $error = '';
        Template::render('navbar.php','bottom.php','home.php','Acceuil',['script.js'],['style.css'],$error);
    }

    public function get404(){
        $error = '';
        Template::render('navbar.php','bottom.php','error.php','404',['script.js'],['style.css'],$error);
    }
}

?>