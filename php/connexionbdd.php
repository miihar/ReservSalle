<?php
class MaConnexion{
    // étape 1 : ici on met les proprietées
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote){
        
        $this -> nomBaseDeDonnees = $nomBaseDeDonnees;
        $this -> motDePasse = $motDePasse;
        $this -> nomUtilisateur = $nomUtilisateur;
        $this -> hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage();
        }        
    }

    //fonction pour selectionner des elements dans la bdd
    public function selectSalle($table){
        try {
            $requete = "SELECT * from $table /*where identifiant = :identifiant and mot_de_passe = :mdp*/";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            /*  
                $requete_preparee->bindParam(":identifiant", $identifiant,PDO::PARAM_STR);
                $requete_preparee->bindParam(":mdp", $password,PDO::PARAM_STR);
            */
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;

        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

}


?>