<?php
session_start();

require('./controller/Maincontroller.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'error') {
        errorPage($_GET['message']);
    }

    if ($_GET['action'] == 'adminPanel') {
        adminPanel();
    }

    if ($_GET['action'] == 'articlesPage') {
        articlesPage();
    }

    if ($_GET['action'] == 'login') {
        login();
    }

    if ($_GET['action'] == 'disconnect') {
        disconnect();
    }

    if ($_GET['action'] == 'signup') {
        signup();
    }

    if ($_GET['action'] == 'signupEnd') { // On effectue les vérifications avant l'envoi dans la bdd
        signupEnd($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['email']);
    }

    if ($_GET['action'] == 'loginEnd') { // Connexion du membre
        loginPage($_POST['pseudo'], $_POST['pass']);
    }

    if ($_GET['action'] == 'adminPanelPost') { // Création de l'article
        adminPanelPage($_POST['title'], $_POST['content']);
    }

    if ($_GET['action'] == 'articleDelete') { // Article cible à delete
        deleteArticle($_GET['article']);
    }

    if ($_GET['action'] == 'articleUpdate') { // Article cible à éditer
        updateArticle($_GET['article']);
    }

    if ($_GET['action'] == 'commentairesPage') { // Article cible à afficher
        articlePage($_GET['article']);
    }

    if ($_GET['action'] == 'editPanelPost') { // Page de modification de l'article
        editPanelPage($_GET['article'], $_POST['title'], $_POST['content']);
    }

    if ($_GET['action'] == 'commentsPost') { // Envoyer un commentaire à l'article cible
        commentsPage($_GET['article'], $_POST['pseudo'], $_POST['comments']);
    }

    if ($_GET['action'] == 'signalement') { // Signaler un article
        commentSignal($_GET['idcomment'], $_GET['idarticle']);
    }

} else {
    home();
}



?>