<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <form class="box" action="select.php" method="POST">
        <h1 class="heading">Se Connecter</h1>

        <input type="text" class="name box-name" placeholder="Identifiant" name="identifiant">

        <input type="password" class="passsword box-name" placeholder="Mot De Passe" name="mdp">

        <button type="submit" class="submit">Let's GO !</button>
<?php
        function function_alert($message) {
            echo "<script>alert('$message');</script>";
        }
        // function_alert("wsh t qui?");
    
?>
    

    </form>
</body>
</html>