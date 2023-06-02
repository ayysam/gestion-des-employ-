<?php
class User{
   public $id;
   public $fullname; 
   public $username; 
   public $password; 
   

 public function __construct($id,$fullname,$username,$password){
     $this->id=$id;
     $this->fullname=$fullname;                 
     $this->username=$username;          
     $this->password=$password;                               
 }
 public static function createUser($data){
    $stmt = DB::connect()->prepare('INSERT INTO user (fullname,username,password) VALUES (:fullname,:username,:password)');
        $stmt->bindParam(':fullname',$data->fullname);
        $stmt->bindParam(':username',$data->username);
        $stmt->bindParam(':password',$data->password);
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

 static public function login($data){
    try{
        $stmt = DB::connect()->prepare('SELECT * FROM user WHERE username=?');
        $stmt->execute(array($data['username']));
        $user=$stmt->fetch((PDO::FETCH_OBJ));
        return $user;
        if($stmt->execute()){
           return 'ok';
       }
    }
    catch(PDOException $ex){
        echo 'erreur:'. $ex->getMessage();
    }
}
}
?>