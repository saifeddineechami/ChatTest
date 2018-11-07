
<?php include 'header.view.php';?>
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h1 class="form-heading">Inscription</h1>
            </div>
            <form id="Login" method="post">

                <div class="form-group">
                    <input type="text" class="form-control" name="firstname" placeholder="Nom" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="Prénom" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="email" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
                </div>
                <div class="forgot">
                    <a href="<?php echo __baseurl__;?>user/login">Se Connecter</a>
                </div>
                <button type="submit" class="btn btn-primary">Créer un compte</button>

            </form>
        </div>
    </div>
</div>

<?php include 'footer.view.php'; ?>
