<header>



<nav class="navbar bg-light shift">
    <a class="navImg" href="./"><img src="public\img\book.png" alt="logo du site" class="img-fluid title_img" /></a>
    <ul>
        <li><a class="navbar-brand" href="./">ACCUEIL</a></li>
        <li><a class="navbar-brand" href="index.php?action=articlesPage">LECTURE</a></li>
        <?php echo isset($_SESSION['pseudo']) ? '<li><a class="navbar-brand" href="index.php?action=disconnect">DECONNEXION</a></li>' : '<li><a class="navbar-brand" href="index.php?action=login">CONNEXION</a></li>' ?>
    </ul> 
</nav>

</header>