<footer>
    <div class="footerBloc">
        <h2>Navigation</h2>
        <nav>
            <ul>
                <li><a href="#">ACCUEIL</a></li>
                <li><a href="./index.php?action=articlesPage">LECTURE</a></li>
            </ul>
        </nav>
    </div>

    <div class="footerBloc">
        <h2>Compte</h2>
        <nav>
            <ul>
                <li><a href="./index.php?action=signup">CRÉER UN COMPTE</a></li>
                <?php echo isset($_SESSION['pseudo']) ? '<li><a class="navbar-brand" href="index.php?action=disconnect">DECONNEXION</a></li>' : '<li><a class="navbar-brand" href="index.php?action=login">CONNEXION</a></li>' ?>
                <?php
                    if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == 1) {
                    echo '<li><a class="navbar-brand" href="index.php?action=adminPanel">PANEL ADMINISTRATION</a></li>';
            }
        }?>
            </ul>
        </nav>
    </div>

</footer>

</body>
</html>