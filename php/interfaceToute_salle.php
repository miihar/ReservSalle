<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenue sur ce magifique site de Reservation de salle</h1>
    <main>
        <section class="card shadow">
            <h2 class="card-header">Voici toute les salle que nous disposons</h2>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>nom salle</th>
                        <th>prix</th>
                        <th>type</th>
                        <th>statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connexionbdd.php';
                    $uneDonnees = new MaConnexion("reservsalle", "", "root", "localhost");
                    $salle = $uneDonnees->selectSalle("salle");
                    foreach ($salle as $donee) {
                        echo
                        '<tr>
                            <td>' . $donee['Nom_Salle'] . '</td>
                            <td>' . $donee['Prix'] . '</td>
                            <td>' . $donee['Type'] . '</td>
                            <td>' . $donee['Statut_Salle'] . '</td>
                        <tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!-- reserver -->
        <section>
            <?php
                include "modal.php";
                include "deleteModal.php";
            ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ajouter une reservation
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                suppr une reservation
            </button>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>