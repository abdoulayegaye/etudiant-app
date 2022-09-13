<?php
    $classe = getClasses();
    if (isset($_POST['valider'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $moyenne = $_POST['moyenne'];
        $classe = $_POST['classe'];
        //extract($_POST);
        $ok = addEtudiant($nom, $prenom, $moyenne, $classe);
    }
?>
<div class="container spacer col-md-5">
    <div class="card">
        <div class="card-header police center">Ajout d'un Etudiant</div>
        <div class="card-body">
            <?php
                if(isset($ok)){
                    if($ok == 1)
                        echo "<div class='alert-success'>Succés !</div>";
                    else
                        echo "<div class='alert-danger'>Echec !</div>";
                }
            ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="" class="control-label">Matricule</label>
                    <input class="form-control" type="text" name="matricule" value="<?= generateMatricule()?>" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Nom</label>
                    <input class="form-control" type="text" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Prénom</label>
                    <input class="form-control" type="text" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Moyenne</label>
                    <input class="form-control" type="number" name="moyenne" min="0" max="20" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="">Classe</label>
                    <select class="form-control" name="classe" required>
                        <option value="0">-- Sélectionner une classe --</option>
                        <?php foreach($classe as $c) {?>
                            <option value="<?= $c['idC'] ?>"><?= $c['libelle'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="center">
                    <input type="submit" class="btn btn-primary" name="valider" value="Ajouter">
                    <input type="reset" class="btn btn-danger" name="annuler" value="Annuler">
                </div>
            </form>
        </div>
    </div>
</div>