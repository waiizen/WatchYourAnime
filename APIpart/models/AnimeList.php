<?php
class AnimeList{
    // Connexion
    private $connexion;
    private $table = "WYA";

    // object properties
    public $animeId;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Lecture des animes
     *
     * @return void
     */
    public function lire(){
        // On écrit la requête
        $sql = "SELECT animeId FROM " . $this->table . "";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Créer un anime
     *
     * @return void
     */
    public function creer(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " VALUES (NULL, :animeId )";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->animeId=htmlspecialchars(strip_tags($this->animeId));

        // Ajout des données protégées
        $query->bindParam(':animeId', $this->animeId);

        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }

}