<?php 

require_once('Manager.php');

class Article extends Manager {

    // Fonction pour récupérer tous les articles
    public function getAll() {
        $db = $this -> dbConnect();
        $req = $db -> query('SELECT * FROM article');
        return $req;
    }

    // Fonction pour récupérer un article
    public function getOne($id) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('SELECT id, title, content FROM article WHERE id = ?');
        $req -> execute(array(
            $id
        ));
        $datas = $req -> fetch();
        return $datas;
    }

    // Fonction pour créer un nouvel article
    public function add($title, $content) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('INSERT INTO article (title, content) VALUES(?, ?)');
        $req -> execute(array(
            $title,
            $content
        ));

        echo "Votre article a bien été ajouté";
        return $req;
    }

    // Fonction pour supprimer un article
    public function delete($id) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('DELETE FROM article WHERE id = ?');
        $req -> execute(array(
            $id
        ));

        echo "Votre article a bien été supprimé";
        return $req;
    }

    // Fonction pour edit un article
    public function update($id, $title, $content) {
        $db = $this -> dbConnect();
        $req = $db -> prepare('UPDATE article SET title = :title, content = :content WHERE id = :id');
        $req -> execute(array(
            'title' => $title,
            'content' => $content,
            'id' => $id
        ));

        echo "Votre article a bien été modifié";
        return $req;
    }

}

?>