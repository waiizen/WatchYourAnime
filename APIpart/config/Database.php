<?php

class Database{
    // Propriétés de la base de données
    private $host = "nathanfeqm330.mysql.db";
    private $db_name = "nathanfeqm330";
    private $username = "nathanfeqm330";
    private $password = "xxxx";
    public $connexion;

    // getter pour la connexion
    public function getConnection(){
        // On commence par fermer la connexion si elle existait
        $this->connexion = null;

        // On essaie de se connecter
        try{
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connexion->exec("set names utf8"); // On force les transactions en UTF-8
        }catch(PDOException $exception){ // On gère les erreurs éventuelles
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        // On retourne la connexion
        return $this->connexion;
    }   
}

?>