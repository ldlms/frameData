<?php

namespace frameData\model;

require './utils/connectBdd.php';

use frameData\utils\BddConnect;

//#[\AllowDynamicProperties] pour authoriser les propriétés dynimiques si on se sent mesquin 
class Character extends BddConnect
{

    private ?int $id_Character;
    private ?string $nom_Character;
    private ?string $image_Character;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id_Character;
    }

    public function setId(?int $id)
    {
        $this->id_Character = $id;
    }

    public function getNomCharacter(): ?string
    {
        return $this->nom_Character;
    }

    public function getImageCharacter(): ?string
    {
        return $this->image_Character;
    }

    public function setNomCharacter(?string $nomCharacter): void
    {
        $this->nom_Character = $nomCharacter;
    }

    public function setImageCharacter(?string $imageCharacter): void
    {
        $this->image_Character = $imageCharacter;
    }

    // méthodes


    public function add()
    {
        try {
            $nomCharacter = $this->getNomCharacter();
            $imageCharacter = $this->getImageCharacter();
            $req = $this->connexion()->prepare(
                'INSERT INTO `character`(nom_character,image_character)
            VALUES (?,?)'
            );
            $req->bindParam(1, $nomCharacter, \PDO::PARAM_STR);
            $req->bindParam(2, $imageCharacter, \PDO::PARAM_STR);
            $req->execute();
        } catch (\Exception $e) {
            die('Error :' . $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $req = $this->connexion()->prepare('SELECT nom_character,image_character FROM `character`');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Character::class);
        } catch (\Exception $e) {
            die('Error :' . $e->getMessage());
        }
    }

    public function findOneBy()
    {
        try {
            $nom = $this->getNomCharacter();
            $req = $this->connexion()->prepare('SELECT id_character, nom_character, image_character FROM `character` WHERE nom_character = ?');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Character::class); //j'ai essayé de recup une classe mais on tombe vite dans une deprecation de propriétés dynamiques
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e) {
            die('Error :' . $e->getMessage());
        }
    }
}
