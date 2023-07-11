<?php
include ("connexionbdd.php");

$test = new MaConnexion("reservsalle", "", "root", "localhost");

$inserClient = $test->insertionClient(
    $_POST['Nom'], $_POST['Prenom'], $_POST['Mail'],
);

$inserStatut = $test->maj_Statut($_POST['Salle']);


header("Location: interfaceToute_salle.php");


?>