<?php
if(isset($_POST['find'])){
    $employeC = new EmployeController();
    $employes = $employeC->FindEmp();
}else{
$employeC = new EmployeController();
$employes = $employeC->getAllEmployes();
}
?>
<div class ="container">
    <div class="row my-4 ">
        <div class="col-md-10 mx-auto">
            <?php include('./Views/Includes/Alert.php'); ?>
            <div class="card">
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>Add" class="btn btn-sm btn-primary mr-2 mb-2">
                       <i class=" fas fa-plus"> </i> 
                    </a>
                    <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-primary mr-2 mb-2">
                       <i class=" fas fa-home"> </i> 
                    </a>
                    <a href="<?php echo BASE_URL;?>Logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
                       <i class=" fas fa-user mr-2"> <?php echo $_SESSION['username']?> </i> 
                    </a>
                
                    <form class="float-right d-flex flex-row mb-2" method="post">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher">
                        <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Nom & Prénom</th>
                        <th scope="col">Matricule</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Date embauche</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employes as $employe):?>
                        <tr>
                        <th scope="row"><?php echo $employe['nom'].' '.$employe['prenom'];?></th>
                        <td><?php echo $employe['matricule'];?></td>
                        <td><?php echo $employe['departement'];?></td>
                        <td><?php echo $employe['poste'];?></td>
                        <td><?php echo $employe['date_emb'];?></td>
                        <td>
                            <?php echo $employe['statut'] == 1
                            ?
                            '<span class="badge badge-success">Active</span>'
                            :
                            '<span class="badge badge-danger">Resilié</span>';
                            ;?>
                        </td>
                        <td class="d-flex flex-row">
                            <form class="mr-1" method ='post' action="Update">
                                <input type="hidden" name ="id" value="<?php echo $employe['id'];?>">
                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            </form>

                            <form class="mr-1" method ='post' action="Delete">
                                <input type="hidden" name ="id" value="<?php echo $employe['id'];?>">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>

                        </tr>
                        <?php endforeach;?>
                            
                        
                    </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>