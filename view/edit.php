<?php
    $id = $_GET['id'];
    $etu = getEtudiantById($id);
    $classe = getClasses();
    if(isset($_POST['modifier']))
    {
        extract($_POST);
        updateEtudiant($id, $nom, $prenom, $moyenne, $classe);
        header("location:?page=list"); //Redirection automatique
    }
?>
<div class="container spacer col-md-5">
    <div class="card">
        <div class="card-header police center">Modification d'un Etudiant</div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="" class="control-label">Matricule</label>
                    <input class="form-control" type="text" name="matricule" value="<?= $etu['matricule'] ?>"readonly>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Nom</label>
                    <input class="form-control" type="text" name="nom" value="<?= $etu['nom']?>" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Prénom</label>
                    <input class="form-control" type="text" name="prenom" value="<?= $etu['prenom']?>" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Moyenne</label>
                    <input class="form-control" type="number" name="moyenne" value="<?= $etu['moyenne']?>" min="0" max="20" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="">Classe</label>
                    <select class="form-control" name="classe" required>
                        <option value="0">-- Sélectionner une classe --</option>
                        <?php foreach($classe as $c) {?>
                            <?php $selected = ($etu['idClasse'] == $c['idC']) ? 'selected' : '';?>
                            <option <?= $selected ?> value="<?= $c['idC'] ?>"><?= $c['libelle'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="center">
                    <input type="submit" class="btn btn-success" name="modifier" value="Modifier">
                    <input type="reset" class="btn btn-danger" name="annuler" value="Annuler">
                </div>
            </form>
        </div>
    </div>
</div>