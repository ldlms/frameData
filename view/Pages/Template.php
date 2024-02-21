<?php

namespace frameData\view;

class Template{

    public static function render($navbar, $footer, $content, $title, array $js, array $css, $error, $tab=null){
        if(file_exists('./view/Pages/'.$content)){
            include './view/Pages/Layout/'.$navbar;     
            include './view/Pages/'.$content; 
            include './view/Pages/Layout/'.$footer;     
        }
        include './view/Pages/Layout/header.php'; 

    }

}
?>