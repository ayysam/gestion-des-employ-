<?php
if (isset($_POST['submit'])) {
    $loginUser = new UserController();
    $loggedUser = $loginUser->auth();
}
?>
<div class="container">
    <div class="row my-4 ">
        <div class="col-md-6 mx-auto">
            <?php include('./Views/Includes/Alert.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Connexion</h3>
                </div>
                <div class="card-body bg-light">
                    <form class="mr-1" method='post'>
                        <div class="form-group">
                            <input class="form-control" type="text" name ="username" placeholder="pseudonyme">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" name ="password" placeholder="Mot de passe">
                        </div>
                        <button class="btn btn-sm btn-primary" name="submit">Connexion</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL ."register";?>" class="btn btn-link">Inscription</a>
                </div>
            </div>
        </div>
    </div>
</div>