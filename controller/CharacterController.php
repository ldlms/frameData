<?php
namespace frameData\controller;

include './model/Character.php';
include './utils/utilitaire.php';

use frameData\model\Character;
use frameData\utils\Utilitaire;
use frameData\view\Template;

class CharacterController extends Character{

    public function addCharacter(){
        $error = '';
        if(isset($_POST['submit'])){
            if(!empty($_POST['nomCharacter']) AND isset($_FILES['imageCharacter']) AND $_FILES['imageCharacter']['error'] == UPLOAD_ERR_OK){
                $this->setNomCharacter(Utilitaire::cleanInput($_POST['nomCharacter']));
                if($_FILES['imageCharacter']['tmp_name']!=""){
                    $ext = Utilitaire::getFileExtension($_FILES['imageCharacter']['name']);
                    if($ext=='png' OR $ext=='jpg' OR $ext=='PNG' OR $ext=='JPG' OR $ext=='bmp' OR $ext=='BMP'){
                        $this->setImageCharacter($_FILES['imageCharacter']['name']);
                    }else{
                        $error = 'format incorrect';
                        $this->setImageCharacter('./public/images/basic.jpg');
                    }
                }else{
                $this->setImageCharacter('./public/images/basic.jpg');
                }
                if($this->findOneBy()){
                    $error = 'le personnage à déja été crée';
                }else{
                $this->add();
                move_uploaded_file($_FILES['imageCharacter']['tmp_name'], './public/images/'.$_FILES['imageCharacter']['name']);
                $error = 'personnage créee !';   
            }
        }else{
            $error = 'veuillez remplir le formulaire';
        }
    }
    Template::render('navbar.php','bottom.php','addCharacter.php','addCharacter',['script.js'],['style.css'],$error);
    }
}




?>