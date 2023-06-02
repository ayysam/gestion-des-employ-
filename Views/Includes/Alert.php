<?php

if(isset($_COOKIE['Success'])){
   echo '<div class="alert alert-success">'.$_COOKIE['Success'].'</div>';
}

if(isset($_COOKIE['Error'])){
    echo '<div class="alert alert-danger">'.$_COOKIE['Error'].'</div>';
 }

 if(isset($_COOKIE['info'])){
    echo '<div class="alert alert-info">'.$_COOKIE['info'].'</div>';
 }
?>

