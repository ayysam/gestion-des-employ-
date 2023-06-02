<?php
class UserController{
    public function register(){
        if(isset($_POST['submit'])){
            $options = ['cost' => 12];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
            $user = new User(null,"","","");
            $user->fullname = $_POST['fullname'];
            $user->username = $_POST['username'];
            $user->password = $password;

           
            // $data = array(
            //     'nom' => $_POST['nom'],
            //     'prenom' => $_POST['prenom'],
            //     'matricule' => $_POST['mat'],
            //     'departement' => $_POST['depart'],
            //     'poste' => $_POST['poste'],
            //     'date_emb' => $_POST['date_emb'],
            //     'statut' => $_POST['statut'],
            // );
            $result = $user->createUser($user);
            if($result === 'ok'){
                Session::set('Success','Compte créer');
                Redirect::to('login');
        }
        else{
            echo "erreur";
        }
    }
    }

    public function auth(){
        if(isset($_POST['submit'])){
            $data['username'] = $_POST['username'];
            $result = User::login($data);
            if($result->username == $_POST['username'] && password_verify($_POST['password'],$result->password)){
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $result->username;
                Redirect::to('Home');
            }
            else{
                Session::set('Error','pseudo ou mot de passe est incorrecte');
                Redirect::to('login');
            }
    }
    }

    static public function logout(){
        session_destroy();
    }
}
?>