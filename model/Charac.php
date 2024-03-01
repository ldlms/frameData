<?php

namespace frameData\model;

require './utils/connectBdd.php';
require './model/character.php';

use frameData\utils\BddConnect;
use frameData\model\Character;

class Carac extends BddConnect
{

    private int $id_carac;
    private ?int $hp_carac;
    private ?float $throwRange_carac;
    private ?float $fwdWalkSpeed_carac;
    private ?float $backWalkSpeed_carac;
    private ?int $fwdDashSpeed_carac;
    private ?int $backDashSpeed_carac;
    private ?float $fwdDashDistance_carac;
    private ?float $backDashDistance_carac;
    private ?string $jumpSpeed_carac;
    private ?float $fwdJumpDistance_carac;
    private ?float $backJumpDistance_carac;
    private ?float $jumpApex_carac;
    private ?Character $character_carac;

    public function __construct()
    {
        $this->character_carac = new Character;
    }
    public function getId(): int
    {
        return $this->id_carac;
    }
    public function setId(?int $id): void
    {
        $this->id_carac = $id;
    }
    public function getHp(): ?int
    {
        return $this->hp_carac;
    }
    public function setHp(?int $hp): void
    {
        $this->hp_carac = $hp;
    }
    public function getThrowRange(): ?float
    {
        return $this->throwRange_carac;
    }
    public function setThrowRange(?float $throwRange): void
    {
        $this->throwRange_carac = $throwRange;
    }
    public function getFwdWalkSpeed(): ?float
    {
        return $this->fwdWalkSpeed_carac;
    }
    public function setFwdWalkSpeed(?float $fwdWalkSpeed): void
    {
        $this->fwdWalkSpeed_carac = $fwdWalkSpeed;
    }
    public function getBackWalkSpeed(): ?float
    {
        return $this->backWalkSpeed_carac;
    }
    public function setBackWalkSpeed(?float $backWalkSpeed): void
    {
        $this->backWalkSpeed_carac = $backWalkSpeed;
    }
    public function getFwdDashSpeed(): ?int
    {
        return $this->fwdDashSpeed_carac;
    }
    public function setFwdDashSpeed(?int $fwdDashSpeed): void
    {
        $this->fwdDashSpeed_carac = $fwdDashSpeed;
    }
    public function getBackDashSpeed(): ?int
    {
        return $this->backDashSpeed_carac;
    }
    public function setBAckDashSpeed(?int $backDashSpeed): void
    {
        $this->backDashSpeed_carac = $backDashSpeed;
    }
    public function getFwdDashDistance(): ?float
    {
        return $this->fwdDashDistance_carac;
    }
    public function setFwdDashDisatance($fwdDashDistance): void
    {
        $this->fwdDashDistance_carac = $fwdDashDistance;
    }
    public function getBackDashDistance(): ?float
    {
        return $this->backDashDistance_carac;
    }
    public function setBackDashDistance($backDashDistance): void
    {
        $this->backDashDistance_carac = $backDashDistance;
    }
    public function getJumpSpeed(): ?string
    {
        return $this->jumpSpeed_carac;
    }
    public function setJumpSpeed($jumpSpeed): void
    {
        $this->jumpSpeed_carac = $jumpSpeed;
    }
    public function getFwdJumpDistance(): ?float
    {
        return $this->fwdJumpDistance_carac;
    }
    public function setFwdJumpDistance($fwdJumpDistance): void
    {
        $this->fwdJumpDistance_carac = $fwdJumpDistance;
    }
    public function getBackJumpDistance(): ?float
    {
        return $this->backJumpDistance_carac;
    }
    public function setBackJumpDistance($backJumpDistance): void
    {
        $this->backJumpDistance_carac = $backJumpDistance;
    }
    public function getJumpApex(): ?float
    {
        return $this->jumpApex_carac;
    }
    public function setJumpApex($jumpApex): void
    {
        $this->jumpApex_carac = $jumpApex;
    }
    public function getCharactercarac(): ?Character
    {
        return $this->character_carac;
    }
    public function setCharactercarac(?Character $character): void
    {
        $this->character_carac = $character;
    }

    public function add()
    {
        try {
            $requete = "INSERT INTO carac (hp_carac,throwRange_carac,fwdWalkSpeed_carac,backWalkSpeed_carac,fwdDashSpeed_carac,
                        backDashSpeed_carac,fwdDashDistance_carac,backDashDistance_carac,jumpSpeed_carac,fwdJumpDistance_carac,backJumpDistance_carac,jumpApex_carac,character_carac)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $hp_carac = $this->getHp();
            $throwRange_carac = $this->getThrowRange();
            $fwdWalkSpeed_carac = $this->getFwdWalkSpeed();
            $backWalkSpeed_carac = $this->getBackWalkSpeed();
            $fwdDashSpeed_carac = $this->getFwdDashSpeed();
            $backDashSpeed_carac = $this->getBackDashSpeed();
            $fwdDashDistance_carac = $this->getFwdDashDistance();
            $backDashDistance_carac = $this->getBackDashDistance();
            $jumpSpeed_carac = $this->getJumpSpeed();
            $fwdJumpDistance_carac = $this->getFwdJumpDistance();
            $backJumpDistance_carac = $this->getBackJumpDistance();
            $jumpApex_carac = $this->getJumpApex();
            $character_carac = $this->character_carac->getId();
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1, $hp_carac, \PDO::PARAM_INT);
            $req->bindParam(2, $throwRange_carac, \PDO::PARAM_INT);
            $req->bindParam(3, $fwdWalkSpeed_carac, \PDO::PARAM_INT);
            $req->bindParam(4, $backWalkSpeed_carac, \PDO::PARAM_INT);
            $req->bindParam(5, $fwdDashSpeed_carac, \PDO::PARAM_INT);
            $req->bindParam(6, $backDashSpeed_carac, \PDO::PARAM_INT);
            $req->bindParam(7, $fwdDashDistance_carac, \PDO::PARAM_INT);
            $req->bindParam(8, $backDashDistance_carac, \PDO::PARAM_INT);
            $req->bindParam(9, $jumpSpeed_carac, \PDO::PARAM_STR);
            $req->bindParam(10, $fwdJumpDistance_carac, \PDO::PARAM_INT);
            $req->bindParam(11, $backJumpDistance_carac, \PDO::PARAM_INT);
            $req->bindParam(12, $jumpApex_carac, \PDO::PARAM_INT);
            $req->bindParam(13, $character_carac, \PDO::PARAM_INT);
            $req->execute();
        } catch (\ErrorException $e) {
            die("erreur dans la fonction add" . $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $requete = "SELECT hp_carac,throwRange_carac,fwdWalkSpeed_carac,backWalkSpeed_carac,fwdDashSpeed_carac,
            backDashSpeed_carac,fwdDashDistance_carac,backDashDistance_carac,jumpSpeed_carac,fwdJumpDistance_carac,backJumpDistance_carac,jumpApex_carac,character_carac FROM carac";
            $req = $this->connexion()->prepare($requete);
            return $req->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Carac::class);
        } catch (\ErrorException $e) {
            die("erreur dans la méthode findAll" . $e->getMessage());
        }
    }

    public function find()
    {
        try {
            $requete = "SELECT id_carac FROM carac WHERE id_carac=?";
            $requete2 = "SELECT id_carac,hp_carac,throwRange_carac,fwdWalkSpeed_carac,backWalkSpeed_carac,fwdDashSpeed_carac,
            backDashSpeed_carac,fwdDashDistance_carac,backDashDistance_carac,jumpSpeed_carac,fwdJumpDistance_carac,backJumpDistance_carac,jumpApex_carac,
            character_carac AS character_id,nom_character AS nom, image_character AS `image`,
            FROM carac 
            INNER JOIN `character` AS `character` ON carac.character_carac = `character`.id_character  
            WHERE id_carac=? ";
            $id = $this->getId();
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            if ($req->fetch()) {
                $req = $this->connexion()->prepare($requete2);
                $req->bindParam(1, $id, \PDO::PARAM_INT);
                $req->execute();
                $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Carac::class);
                $carac = $req->fetch();
                $carac->getCharactercarac()->setId($carac->personnage);
                $carac->getCharactercarac()->setNomCharacter($carac->nom);
                $carac->getCharactercarac()->setImageCharacter($carac->image);
            } else {
                $carac = null;
            }
            return $carac;
        } catch (\Exception $e) {
            die("erreur dans la fonction find" . $e->getMessage());
        }
    }
}
