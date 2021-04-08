<?php

require_once('Manager.php');

class Comment extends Manager {

    public function add($id_article, $author, $comments) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO comments (id_article, author, comments, date) VALUES(?, ?, ?, NOW())');
        $req -> execute(array(
            $id_article,
            $author,
            $comments
        ));

        return $req;
    }

    // Fonction pour supprimer un commentaire
    public function delete($id) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('DELETE FROM comments WHERE id = ?');
        $req -> execute(array(
            $id
        ));

        echo "Le commentaire a bien été supprimé";
        return $req;
    }

    public function signalComment($idComment) { // On regarde si les pseudos sont admins

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT signalement FROM comments WHERE id = :id');
        $req -> execute(array(
            'id' => $idComment
        ));
        return $req;
    }

    // Fonction pour récupérer tous les commentaires signalés
    public function getAll() {
        $db = $this -> dbConnect();
        $req = $db -> query('SELECT * FROM comments WHERE signalement = 1');
        return $req;
    }

    public function updateSignal($id) { // On passe l'entrée signalement à 1 si le commentaire est signalé

        $db = $this -> dbConnect();

        $req = $db -> prepare('UPDATE comments SET signalement = 1 WHERE id = :id');
        $req -> execute(array(
            'id' => $id
        ));
        return $req;
    }

    public function select($id_article) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('SELECT id, id_article, author, comments, date, signalement FROM comments WHERE id_article = ?');
        $req -> execute(array(
            $id_article,
        ));
        return $req;
    }
    
}

?>