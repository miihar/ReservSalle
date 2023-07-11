<?php
include ("connexionbdd.php");

$test = new MaConnexion("reservsalle", "", "root", "localhost");


$inserStatut = $test->deleteReserv($_POST['Salle']);


header("Location: interfaceToute_salle.php");


?>