<?php

class Model
{


    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;


    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;


    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {

        try {
            include 'Utils/credentials.php';
            $this->bd = new PDO($dsn, $login, $mdp);
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bd->query("SET nameS 'utf8'");
        } catch (PDOException $e) {
            die('Echec connexion, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }


    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {

        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function addNewFile($nom)//ajoute un fichier à la base de données
    {

        try {
            //Préparation de la requête
            $requete = $this->bd->prepare('INSERT INTO fichier_upload (nom) VALUES (:nom)');

            //Remplacement des marqueurs de place par les valeurs
            $requete->bindValue(':nom', $nom);

            //Exécution de la requête
            return $requete->execute();
        } catch (PDOException $e) {
            die('Echec addNewFile, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

}
