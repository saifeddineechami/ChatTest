
<?php include 'header.view.php';?>
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h1 class="form-heading">Inscription</h1>
            </div>

            <form id="Login" method="post">
                <?php if (isset($errors) && !empty($errors)) { ?>
                    <div class="alert alert-danger">

                        <?php foreach ($errors as $error) { ?>
                            <strong>Error!</strong> <?php echo $error; ?> <br>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <input type="text" class="form-control" name="firstName" placeholder="Nom" value="<?php if(isset($data) && isset($data["firstName"]) && !is_null($data["firstName"])) echo $data["firstName"]; ?>" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="lastName" placeholder="Prénom" value="<?php if(isset($data) && isset($data["lastName"]) && !is_null($data["lastName"])) echo $data["lastName"]; ?>" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="userName" placeholder="UserName" value="<?php if(isset($data) && isset($data["userName"]) && !is_null($data["userName"])) echo $data["userName"]; ?>" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($data) && isset($data["email"]) && !is_null($data["email"])) echo $data["email"]; ?>" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirmation de mot de passe">
                </div>
                <div class="forgot">
                    <a href="<?php echo __baseurl__;?>/user/login">Se Connecter</a>
                </div>
                <button type="submit" class="btn btn-primary">Créer un compte</button>

            </form>
        </div>
    </div>
</div>

<?php include 'footer.view.php'; ?>
