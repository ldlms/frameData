<?php

namespace frameData\model;

require './utils/connectBdd.php';

use frameData\utils\BddConnect;
use frameData\utils\Utilitaire;

class Utilisateur extends BddConnect
{

    private int $id_utilisateur;
    private ?string $nom_utilisateur;
    private ?string $mail_utilisateur;
    private ?string $mdp_utilisateur;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id_utilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNom($nom): void
    {
        $this->nom_utilisateur = $nom;
    }

    public function getMail(): ?string
    {
        return $this->mail_utilisateur;
    }

    public function setMail($mail): void
    {
        $this->mail_utilisateur = $mail;
    }

    public function getMdp(): ?string
    {
        return $this->mdp_utilisateur;
    }

    public function setMdp($mdp): void
    {
        $this->mdp_utilisateur = $mdp;
    }

    public function add()
    {
        try {
            $request = "INSERT INTO utilisateur (nom_utilisateur,mail_utilisateur,mdp_utilisateur) VALUES (?,?,?)";
            $nom = $this->nom_utilisateur;
            $mail = $this->mail_utilisateur;
            $mdp = $this->mdp_utilisateur;
            $req = $this->connexion()->prepare($request);
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $mail, \PDO::PARAM_STR);
            $req->bindParam(3, $mdp, \PDO::PARAM_STR);
            $req->execute();
        } catch (\Exception $e) {
            die("erreur dans la fonction add" . $e);
        }
    }

    public function findAll()
    {
        try {
            $request = "SELECT id_utilisateur,nom_utlisateur,mail_utilisateur,mdp_utilisateur FROM utilisateur";
            $req = $this->connexion()->prepare($request);
            return $req->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Utilisateur::class);
        } catch (\Exception $e) {
            die("erreur dans la fonction findAll" . $e);
        }
    }

    public function find()
    {
        try {
            $request = "SELECT id_utilisateur FROM utilisateur WHERE id_utilisateur = ?";
            $request2 = "SELECT id_utilisateur,nom_utilisateur,mail_utilisateur,mdp_utilisateur FROM utilisateur";
            $id = $this->getId();
            $req = $this->connexion()->prepare($request);
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            if ($req->fetch()) {
                $id = $this->id_utilisateur;
                $req = $this->connexion()->prepare($request2);
                $req->bindParam(1, $id, \PDO::PARAM_INT);
                $req->execute();
                $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Utilisateur::class);
                $utilisateur = $req->fetch();
            } else {
                $utilisateur = null;
            }
            return $utilisateur;
        } catch (\Exception $e) {
            die("erreur dans la fonction find" . $e);
        }
    }

    public function findOneBy()
    {
        try {
            $request = "SELECT id_utilisateur, nom_utilisateur,mail_utilisateur,mdp_utilisateur FROM utilisateur
            WHERE mail_utilisateur=?";
            $mail = $this->mail_utilisateur;
            $req = $this->connexion()->prepare($request);
            $req->bindParam(1,$mail,\PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Utilisateur::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e) {
            die("erreur dans la fonction findBy" . $e);
        }
    }
}
