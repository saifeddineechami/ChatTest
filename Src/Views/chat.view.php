
<?php include 'header.view.php';?>
<div id="notfound">
    <div class="notfound">
        <div><a href="<?php echo __baseurl__;?>/user/logout">Déconnexion</a></div>

        <h4> Utilisateurs connectés</h4>
        <div id="usres"></div>
        <h4>Discussion</h4>
        <div id="messages"></div>
        <h4>Envoyé votre message</h4>
        <form id="form-message" method="post" >
            <input type="text" name="message" id="message" placeholder="Votre message" required="required">
            <input type="submit" value="Envoyer">
        </form>
    </div>
</div>

<?php include 'footer.view.php'; ?>