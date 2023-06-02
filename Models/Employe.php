<?php 
class Employe {
   public $id;
   public $nom; 
   public $prenom; 
   public $matricule; 
   public $departement;
   public $poste; 
   public $date_emb; 
   public $statut;

 public function __construct($id,$nom,$prenom,$matricule,$departement,$poste,$date_emb,$statut){
     $this->id=$id;
     $this->nom=$nom;                 
     $this->prenom=$prenom;          
     $this->matricule=$matricule;                
     $this->departement=$departement;              
     $this->poste=$poste;             
     $this->date_emb=$date_emb;   
     $this->statut=$statut;             
            
 }



    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM employe');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
}

    static public function AddOne($data){
        $stmt = DB::connect()->prepare('INSERT INTO employe (nom,prenom,matricule,departement,poste,date_emb,statut) VALUES (:nom,:prenom,:matricule,:departement,:poste,:date_emb,:statut)');
        $stmt->bindParam(':nom',$data->nom);
        $stmt->bindParam(':prenom',$data->prenom);
        $stmt->bindParam(':matricule',$data->matricule);
        $stmt->bindParam(':departement',$data->departement);
        $stmt->bindParam(':poste',$data->poste);
        $stmt->bindParam(':date_emb',$data->date_emb);
        $stmt->bindParam(':statut',$data->statut);
        $result = $stmt->execute(); //retourne un boolean
        if($result){
            return 'ok';
        }
        else{
            return 'erreur';
        }
        $stmt->closeCursor();
        $stmt = null;

        // $stmt = DB::connect()->prepare('INSERT INTO employes VALUES(default,?,?,?,?,?,?,?)');
        // $result = $stmt->execute(array($data['nom'],$data['prenom'],$data['matricule'],$data['departement'],$data['poste'],$data['date_emb'],$data['statut']));
}

static public function getOne($data){

    try{
        $stmt = DB::connect()->prepare('SELECT * FROM employe WHERE id=?');
        $stmt->execute(array($data['id']));
        $employe = $stmt->fetch((PDO::FETCH_OBJ));
        return $employe;
    }
    catch(PDOException $ex){
        echo 'erreur:'. $ex->getMessage();
    }
}


static public function update($data){

    $stmt = DB::connect()->prepare('UPDATE employe SET nom = :nom ,prenom = :prenom ,matricule = :matricule, 
    departement = :departement ,poste = :poste,date_emb = :date_emb ,statut = :statut WHERE id = :id');
    $stmt->bindParam(':id',$data->id);
    $stmt->bindParam(':nom',$data->nom);
    $stmt->bindParam(':prenom',$data->prenom);
    $stmt->bindParam(':matricule',$data->matricule);
    $stmt->bindParam(':departement',$data->departement);
    $stmt->bindParam(':poste',$data->poste);
    $stmt->bindParam(':date_emb',$data->date_emb);
    $stmt->bindParam(':statut',$data->statut);
    $result = $stmt->execute(); //retourne un boolean
    if($result){
        return 'ok';
    }
    else{
        return 'erreur';
    }
    $stmt->closeCursor();
    $stmt = null;

}

static public function delete($data){
    try{
        $stmt = DB::connect()->prepare('DELETE FROM employe WHERE id=?');
        $stmt->execute(array($data['id']));
       if($stmt->execute()){
        return 'ok';
       }
    }
    catch(PDOException $ex){
        echo 'erreur:'. $ex->getMessage();
    }
}

static public function findEmployes($data){
     $search = $data['search'];
     try{
        $stmt = DB::connect()->prepare("SELECT * FROM employe WHERE nom LIKE ? OR prenom LIKE ?");
        $stmt->execute(array("%". $search. "%", "%". $search. "%"));
        $employes = $stmt->fetchAll();
        return $employes;
        if($stmt->execute()){
            return 'ok';
        }
     }catch(PDOException $exc){
        echo 'error'. $exc->getMessage();
     }
}


}

?>