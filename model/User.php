<?php
namespace frameData\model;

require './utils/connectBdd.php';

use frameData\utils\BddConnect;

class Utilisateur extends BddConnect{

    private int $id_utilisateur;
    private ?string $nom_utilisateur;
    private ?string $mail_utilisateur;
    private ?string $mdp_utilisateur;

    public function __construct()
    {
        
    }
}

?>