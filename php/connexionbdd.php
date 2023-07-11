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

    public function insertionClient($nom,$prenom,$mail){
        try {
            $requete = " INSERT INTO client(Nom, Prenom, Mail) 
                VALUES (:Nom, :Prenom, :Mail)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Prenom',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Mail',$mail,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    // Fonction de mis à jour du statut de la salle dans la table Salle 
    public function maj_Statut($nomSalle){
        try {

            $requete = "UPDATE salle SET Statut_Salle = 'RES' 
                WHERE Nom_salle = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindvalue(1,$nomSalle,PDO::PARAM_STR);

            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteReserv($nomSalle){
        try{
            $requete = "UPDATE salle SET Statut_Salle = 'LIB'
            WHERE Nom_salle = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindvalue(1,$nomSalle,PDO::PARAM_STR);
            $requete_preparee->execute();
            echo 'modification reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

/*
$test = new MaConnexion("reservsalle", "", "root", "localhost");

$inser = $test->insertionClient("doe","john","mail@mail.co");
var_dump($inser);
$sallee = $test->maj_Statut("Salle Madrid");
var_dump($sallee);
*/

?>