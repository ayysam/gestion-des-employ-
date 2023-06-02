<?php
class EmployeController{

    public function getAllEmployes(){
        $employes = Employe::getAll();
        return $employes;
    }

    public function addEmploye(){
        if(isset($_POST['submitt'])){
            $employe = new Employe(null,"","","","","","","");
            $employe->nom = $_POST['nom'];
            $employe->prenom = $_POST['prenom'];
            $employe->matricule = $_POST['mat'];
            $employe->departement = $_POST['depart'];
            $employe->poste = $_POST['poste'];
            $employe->date_emb = $_POST['date_emb'];
            $employe->statut = $_POST['statut'];
            // $data = array(
            //     'nom' => $_POST['nom'],
            //     'prenom' => $_POST['prenom'],
            //     'matricule' => $_POST['mat'],
            //     'departement' => $_POST['depart'],
            //     'poste' => $_POST['poste'],
            //     'date_emb' => $_POST['date_emb'],
            //     'statut' => $_POST['statut'],
            // );
            $result = $employe->AddOne($employe);
            if($result === 'ok'){
                Session::set('Success','Employé ajouté');
                Redirect::to('Home');
        }
        else{
            echo "erreur";
        }
    }
}

public function getEmploye(){
    if(isset($_POST['id'])){
        $data = array(
            'id' => $_POST['id']
        );
    $employe = Employe::getOne($data);
    return $employe;
    }
}

public function updateEmploye(){
    if(isset($_POST['submitt'])){
        $employe = new Employe(null,"","","","","","","");
        $employe->id = $_POST['id'];
        $employe->nom = $_POST['nom'];
        $employe->prenom = $_POST['prenom'];
        $employe->matricule = $_POST['mat'];
        $employe->departement = $_POST['depart'];
        $employe->poste = $_POST['poste'];
        $employe->date_emb = $_POST['date_emb'];
        $employe->statut = $_POST['statut'];
       
        $result = $employe->update($employe);
        if($result === 'ok'){
            Session::set('Success','Employé modifié');
            Redirect::to('Home');
    }
    else{
        echo $result;
    }
}
}

public function deleteEmploye(){
    if(isset($_POST['id'])){
        $data['id'] = $_POST['id'];
        $result = Employe::delete($data);
        if($result === 'ok'){
            Session::set('Success','Employé supprimé');
            Redirect::to('Home');
        }
        else{
            echo $result;
        }
    }
}

public function findEmp(){
    if(isset($_POST['search'])){
    $data = array('search'=> $_POST['search']);
    }
    $employe = Employe::findEmployes($data);
    return $employe;
    
    // $stmt = DB::connect()->prepare("SELECT * FROM employes WHERE id=?");
    // $result = $stmt->execute()->fetch

}

}
?>