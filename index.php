<?php
require_once 'Views/Includes/Header.php';
require_once './Controllers/HomeController.php';
require_once './Autoload.php';
$home = new HomeController();

$pages = ['Home','Add','Update','Delete','register','login','Logout'];
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
    $page = $_GET['page'];
    $home->index($page);
    }else{
        include('Views/Includes/404.php');
    }
}else{
    $home->index('home');

}
}else if(isset($_GET['page']) && $_GET['page'] == 'register'){
    $home->index('register');
}else{
    $home->index('login');
}

?>

<?php
require_once 'Views/Includes/Footer.php';

?>
