<?php
if(isset($_POST['id'])){
    $empC = new EmployeController();
    $empC->deleteEmploye();
}
?>