<?php 

require_once('Manager.php');

class User extends Manager {

    public function add($pseudo, $pass, $email) { // Fonction d'ajout de membre à la BDD

        $db = $this -> dbConnect();

        $req = $db -> prepare('INSERT INTO users (pseudo, pass, email) VALUES(?, ?, ?)');
        $req -> execute(array(
            $pseudo,
            $pass,
            $email
        ));
        return $req;
    }

    public function userInfo($pseudo) { // On selectionne les pseudos dans la bdd

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $req -> execute(array(
            'pseudo' => $pseudo
        ));
        return $req;
    }

    public function checkEmail($email) { // On selectionne les emails dans la bdd

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT * FROM users WHERE email = :email');
        $req -> execute(array(
            'email' => $email
        ));
        return $req;
    }

    public function checkStatus($pseudo) { // On regarde si les pseudos sont admins

        $db = $this -> dbConnect();

        $req = $db -> prepare('SELECT admin FROM users WHERE pseudo = :pseudo');
        $req -> execute(array(
            'pseudo' => $pseudo
        ));
        return $req;
    }

}

?>