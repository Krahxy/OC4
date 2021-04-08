<?php include("./view/_header.php"); ?>
<?php include("./view/_navbar.php"); ?>

<section class="login">
    <img src="public\img\book.png" alt="logo du site" class="img-fluid" width="130" height="auto"/></a>

    <form action="index.php?action=signupEnd" method="post">
        <h1 class="h3 mb-3 fw-normal">Inscrivez-vous</h1>
        <input type="text" name="pseudo" class="form-control login-form" placeholder="Pseudo" required autofocus>
        <input type="password" name="pass" class="form-control login-form" placeholder="Mot de passe" required>
        <input type="password" name="pass2" class="form-control login-form" placeholder="(Vérification)" required>
        <input type="email" name="email" class="form-control login-form" placeholder="E-mail" required>
        <button class="btn btn-primary" type="submit">Je m'inscris !</button>
    </form>
    
    <a href="./index.php?action=login">Déjà inscrit ? Connectez-vous</a>



</section>

<?php include("./view/_footer.php"); ?>