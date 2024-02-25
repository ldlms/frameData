<?php 
namespace frameData\model;

include './utils/connectBdd.php';
use frameData\utils\BddConnect;

//#[\AllowDynamicProperties] pour authoriser les propriétés dynimiques si on se sent mesquin 
class Character extends BddConnect{

    private ?int $idCharacter;
    private ?string $nomCharacter;
    private ?string $imageCharacter;
     
    public function __construct(){}

    public function getId():?int{
        return $this->idCharacter;
    }

    public function setId(?int $id){
        $this->idCharacter = $id;
    }

    public function getNomCharacter():?string{
        return $this->nomCharacter;
    }

    public function getImageCharacter():?string{
        return $this->imageCharacter;
    }

    public function setNomCharacter(?string $nomCharacter):void{
        $this->nomCharacter = $nomCharacter;
    }

    public function setImageCharacter(?string $imageCharacter):void{
        $this->imageCharacter = $imageCharacter;
    }

    // méthodes


    public function add(){
        try {
            $nomCharacter = $this->getNomCharacter();
            $imageCharacter = $this->getImageCharacter();
            $req = $this->connexion()->prepare('INSERT INTO `character`(nom_character,image_character)
            VALUES (?,?)');
            $req->bindParam(1,$nomCharacter, \PDO::PARAM_STR);
            $req->bindParam(2,$imageCharacter, \PDO::PARAM_STR);
            $req->execute();
        } catch (\Exception $e){
        die('Error :'.$e->getMessage());
    }
}

    public function findAll(){
        try {
            $req = $this->connexion()->prepare('SELECT nom_character,image_character FROM `character`');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Character::class);
        } catch(\Exception $e){
            die('Error :'.$e->getMessage());
        }
    }

    public function findOneBy(){
        try{
            $nom = $this->getNomCharacter();
            $image = $this->getImageCharacter();
            $req = $this->connexion()->prepare('SELECT id_character, nom_character, image_character FROM `character` WHERE nom_character = ? AND image_character = ?');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->bindParam(2,$image,\PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_OBJ); //j'ai essayé de recup une classe mais on tombe vite dans une deprecation de propriétés dynamiques
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e){
            die('Error :'.$e->getMessage());
        }
    }


    
}


?>