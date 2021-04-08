<?php

require_once('./model/ArticleManager.php');
require_once('./model/UserManager.php');
require_once('./model/CommentManager.php');

function home() {
    require('./view/home.php');
}

function adminPanel() {
    $getSignalComments = new Comment();
    $comments = $getSignalComments -> getAll();
    require('./view/adminPanel.php');
}

function login() {
    require('./view/login.php');
}

function disconnect() {
    $_SESSION = array();
    session_destroy();
    setcookie('pseudo', '');
    require('./view/home.php');
}

function signup() {
    require('./view/signup.php');
}

function signupEnd($pseudo, $pass, $pass2, $email) {
    $message = '';
    if (empty($pseudo) OR empty($pass) OR empty($pass2) OR empty($email)) $message='Tous les champs ne sont pas remplis';
    if (strlen($pseudo) AND strlen($pass) AND strlen($email) >= 255) $message='Votre pseudo, mail ou mot de passe ne doit pas dépasser 255 caractères.';
    if ($pass != $pass2) $message='Les mots de passes ne correspondent pas.';

    if ($message != '') {
        header('Location: index.php?action=error&message='.$message);
    } else {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $regUser = new User();
        $req = $regUser -> userInfo($pseudo);
        $req2 = $regUser -> checkEmail($email);
        $pseudoExist = $req -> rowCount();
        $emailExist = $req2 -> rowCount();
    
        if ($pseudoExist == 1 || $emailExist == 1) {
            echo 'Pseudo ou email déjà utilisé';
            require('./view/signup.php');
        } else {
            $users = $regUser -> add($pseudo, $passHash, $email);
            require('./view/login.php');
        }
    }
}

function adminPanelPage($title, $content) { // ENVOI DE L'ARTICLE
    $newArticle = new Article();
    $req = $newArticle -> add($title, $content);
    header('Location: index.php?action=articlesPage');
}

function loginPage($pseudo, $pass) { // Connexion du membre si les mots de passe sont corrects // OK
    $logUser = new User();
    $req = $logUser -> userInfo($pseudo);
    $resultat = $req -> fetch();
    $req2 = $logUser -> checkStatus($pseudo);
    $resultat2 = $req2 -> fetch();
    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']); // On vérifie si le mot de passe corresponds au mot de passe hashé
    if (!$resultat) {
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['status'] = $resultat2[0];
            header('Location: index.php?action=articlesPage');
        } else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
        
}

function commentSignal($id, $idarticle) {
    $commentSignal = new Comment();
    $req = $commentSignal -> updateSignal($id);
    header('Location: index.php?action=commentairesPage&article=' . $idarticle);
}

function articlesPage() { // LISTE DES ARTICLES
    $getArticles = new Article();
    $articles = $getArticles -> getAll();
    require('./view/articlesPage.php');
}

function articlePage($id) { // 1 ARTICLE AVEC COMMENTAIRES
    $oneArticle = new Article();
    $selectComment = new Comment();
    $articleOnce = $oneArticle -> getOne($id);
    $comments = $selectComment -> select($id);
    require('./view/commentairesPage.php');
}

function deleteArticle($id) { // DELETE
    $deleteId = new Article();
    $idDeleted = $deleteId -> delete($id);
    header('Location: index.php?action=articlesPage');
}

function updateArticle($id) { 
    $oneArticle = new Article();
    $articleOnce = $oneArticle -> getOne($id);
    require('./view/editPanel.php');
}

function editPanelPage($id, $title, $content) { // UPDATE
    $updateArticle = new Article();
    $articleUpdated = $updateArticle -> update($id, $title, $content);
    header('Location: index.php?action=articlesPage');
}

function commentsPage($id_article, $author, $comments) { // AFFICHAGE DES COMMENTAIRES
    $addComment = new Comment();
    $req = $addComment -> add($id_article, $author, $comments);
    $resultat = $req -> fetch();
    header('Location: index.php?action=commentairesPage&article=' . $id_article);
}