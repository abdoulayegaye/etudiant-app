<?php
    $etudiants = getEtudiants();
    $moyG = moyenneGeneral()['moyG'];
    #var_dump($etudiants);
?>
<div class="container spacer">
            <div class="card">
                <div class="card-header police center">Liste des étudiants</div>
                <div class="card-body">
                    <table class="center table table-bordered table-striped">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Classe</th>
                            <th>Moyenne</th>
                            <th>Décision</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($etudiants as $e){ ?>
                            <tr>
                                <td><?php echo $e['matricule'];?></td>
                                <td><?= strtoupper($e['nom'])?></td>
                                <td><?= ucwords($e['prenom'])?></td>
                                <td><?= $e['libelle']?></td>
                                <td><?= round($e['moyenne'])?></td>
                                <td><?= ($e['moyenne']>= 10) ? "<span style='color:green'>Passé(e)" : "<span style='color:red'>Redouble(e)</span>"?></td>
                                <td>
                                    <a href="?page=edit&id=<?= $e['idE'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="?page=supp&id=<?= $e['idE'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td colspan="4">Moyenne Générale</td>
                            <td style="color:<?=($moyG < 10) ? 'red' : 'green'?>"><?= round($moyG,2)?></td>
                            <td colspan="2" style="background-color:balck"></td>
                        </tr>
                    </table>
                    <a href="?page=add" class="btn btn-dark">Ajouter un étudiant</a>
                </div>
            </div>
        </div>