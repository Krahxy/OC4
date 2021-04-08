<?php include("./view/_header.php"); ?>
<?php include("./view/_navbar.php"); ?>

<section class="login">
    <img src="public\img\book.png" alt="logo du site" class="img-fluid" width="130" height="auto"/></a>
    <h3 class="h3 mb-3 fw-normal">Connectez-vous</h3>
    <form action="index.php?action=loginEnd" method="post">
        <input type="text" name="pseudo" class="form-control login-form" placeholder="Pseudo" required autofocus>
        <input type="password" name="pass" class="form-control login-form" placeholder="Mot de passe" required>
        <button class="btn btn-primary" type="submit">Connexion</button>
    </form>
    <a href="./index.php?action=signup">Pas encore inscrit ? Inscrivez-vous</a>
</section>

<?php include("./view/_footer.php"); ?>