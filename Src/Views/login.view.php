<?php include 'header.view.php';?>
<div class="container">

    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h1 class="form-heading">Se Connecter</h1>
                <p>S'il vous plaît entrer votre username et mot de passe</p>
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
                    <input type="text" class="form-control" name="userName" placeholder="Username" value="<?php if(isset($data) && isset($data["userName"]) && ! is_null($data["userName"])) echo $data["userName"]; ?>">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password"  placeholder="Mot de passe">
                </div>

                <div class="forgot">
                    <a href="<?php echo __baseurl__;?>/user/register">Créer un compte</a>
                </div>

                <button type="submit" class="btn btn-primary">Connexion</button>

            </form>
        </div>
    </div>
</div>


<?php include 'footer.view.php'; ?>
