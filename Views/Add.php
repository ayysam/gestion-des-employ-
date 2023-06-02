<?php

if(isset($_POST['submitt'])){
    $newEmploye = new EmployeController();
    $newEmploye->addEmploye();
}
?>
<div class ="container">
    <div class="row my-4 ">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card card-header">
                    Ajouter un employé
                </div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                       <i class=" fas fa-home"> </i> 
                    </a>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="Nom"> nom*</label>
                            <input type="text" name="nom" class="form-control" placeholder="nom">
                        </div>

                        <div class="form-group">
                            <label for="prenom"> prénom*</label>
                            <input type="text" name="prenom" class="form-control" placeholder="prénom">
                        </div>

                        <div class="form-group">
                            <label for="mat"> Matricule*</label>
                            <input type="text" name="mat" class="form-control" placeholder="matricule">
                        </div>

                        <div class="form-group">
                            <label for="depart"> Departement*</label>
                            <input type="text" name="depart" class="form-control" placeholder="Departement">
                        </div>

                        <div class="form-group">
                            <label for="poste"> Poste*</label>
                            <input type="text" name="poste" class="form-control" placeholder="Poste">
                        </div>

                        <div class="form-group">
                            <label for="date"> Date d'embauche*</label>
                            <input type="date" name="date_emb" class="form-control" placeholder="jj/mm/aaaa">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name ="statut">
                                <option value="1">Active</option>
                                <option value="0">Résilié</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submitt">Valider</button>
                        </div>
                    </form>
    <?php
    
?>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>