<?php

namespace frameData\model;

include './utils/connectBdd.php';
include './model/Character.php';
use frameData\utils\BddConnect;
use frameData\model\Character;

class Charac extends BddConnect{

    private int $id_charac;
    private ?int $hp_charac;
    private ?float $throwRange_charac;
    private ?float $fwdWalkSpeed_charac;
    private ?float $backWalkSpeed_charac;
    private ?int $fwdDashSpeed_charac;
    private ?int $backDashSpeed_charac;
    private ?float $fwdDashDistance_charac;
    private ?float $backDashDistance_charac;
    private ?string $jumpSpeed_charac;
    private ?float $fwdJumpDistance_charac;
    private ?float $backJumpDistance_charac;
    private ?float $jumpApex_charac;
    private ?Character $character_charac;

    public function __construct(){
        $this->character_charac = new Character;
    }
    public function getId():int{
        return $this->id_charac;
    }
    public function getHp():?int{
        return $this->hp_charac;
    }
    public function setHp(?int $hp):void{
        $this->hp_charac = $hp;
    }
    public function getThrowRange():?float{
        return $this->throwRange_charac;
    }
    public function setThrowRange(?float $throwRange):void{
        $this->throwRange_charac = $throwRange;
    }
    public function getFwdWalkSpeed():?float{
        return $this->fwdWalkSpeed_charac;
    }
    public function setFwdWalkSpeed(?float $fwdWalkSpeed):void{
        $this->fwdWalkSpeed_charac = $fwdWalkSpeed;
    }
    public function getBackWalkSpeed():?float{
        return $this->backWalkSpeed_charac;
    }
    public function setBackWalkSpeed(?float $backWalkSpeed):void{
        $this->backWalkSpeed_charac = $backWalkSpeed;
    }
    public function getFwdDashSpeed():?int{
        return $this->fwdDashSpeed_charac;
    }
    public function setFwdDashSpeed(?int $fwdDashSpeed):void{
        $this->fwdDashSpeed_charac = $fwdDashSpeed;
    }
    public function getBackDashSpeed():?int{
        return $this->backDashSpeed_charac;
    }
    public function setBAckDashSpeed(?int $backDashSpeed):void{
        $this->backDashSpeed_charac = $backDashSpeed;
    }
    public function getFwdDashDistance():?float{
        return $this->fwdDashDistance_charac;
    }
    public function setFwdDashDisatance($fwdDashDistance):void{
        $this->fwdDashDistance_charac = $fwdDashDistance;
    }
    public function getBackDashDistance():?float{
        return $this->backDashDistance_charac;
    }
    public function setBackDashDistance($backDashDistance):void{
        $this->backDashDistance_charac = $backDashDistance;
    }
    public function getJumpSpeed():?string{
        return $this->jumpSpeed_charac;
    }
    public function setJumpSpeed($jumpSpeed):void{
        $this->jumpSpeed_charac = $jumpSpeed;
    }
    public function getFwdJumpDistance():?float{
        return $this->fwdJumpDistance_charac;
    }
    public function setFwdJumpDistance($fwdJumpDistance):void{
        $this->fwdJumpDistance_charac = $fwdJumpDistance;
    }
    public function getBackJumpDistance():?float{
        return $this->backJumpDistance_charac;
    }
    public function setBackJumpDistance($backJumpDistance):void{
        $this->backJumpDistance_charac = $backJumpDistance;
    }
    public function getJumpApex():?float{
        return $this->jumpApex_charac;
    }
    public function setJumpApex($jumpApex):void{
        $this->jumpApex_charac = $jumpApex;
    }
    public function getCharacterCharac():?Character{
        return $this->character_charac;
    }
    public function setCharacterCharac(?Character $character):void{
        $this->character_charac = $character;
    }

    public function add(){
        try{
            $id_charac = $this->getId();
            $hp_charac = $this->getHp();
            $throwRange_charac = $this->getThrowRange();
            $fwdWalkSpeed_charac = $this->getFwdWalkSpeed();
            $backWalkSpeed_charac = $this->getBackWalkSpeed();
            $fwdDashSpeed_charac = $this->getFwdDashSpeed();
            $backDashSpeed_charac = $this->getBackDashSpeed();
            $fwdDashDistance_charac = $this->getFwdDashDistance();
            $backDashDistance_charac = $this->getBackDashDistance();
            $jumpSpeed_charac = $this->getJumpSpeed();
            $fwdJumpDistance_charac;
            $backJumpDistance_charac;
            $jumpApex_charac;

        }catch(\ErrorException $e){
            die("erreur dans la fonction add".$e->getMessage());
        }
    }

}

?>