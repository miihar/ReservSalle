<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titre de la boîte de dialogue modale</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="insertionClient.php" method="POST" >
                    <!-- titre -->
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" placeholder="Saisissez votre Nom" name="Nom" required>
                    </div>
                    <!-- description -->
                    <div class="mb-3">
                        <label for="Prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" placeholder="Saisissez votre Prenom" name="Prenom" required>
                    </div>
                    <!-- date publication -->
                    <div class="mb-3">
                        <label for="Mail" class="form-label">Mail</label>
                        <input type="text" class="form-control" placeholder="Saisissez votre Mail" name="Mail" required>
                    </div>
                    <!-- date publication -->
                    <div class="mb-3">
                        <label for="Salle" class="form-label">Nom Salle</label>
                        <input type="text" class="form-control" placeholder="Saisissez le nom de la salle souhaité" name="Salle" required>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </div>
                </form>
            </div>

        </div>
    </div>
</div>