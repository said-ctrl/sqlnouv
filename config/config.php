<?php

include('users.php');

class bdd
{

    private $bdd;

    public function connect()
    {

        try {
            $this->bdd = new PDO("mysql:host=localhost;dbname=newbdd", 'root', '');

            return $this->bdd;
        } catch (PDOException $e) {

            $error = fopen("error.log", "w");
            $txt = $e . "\n";
            fwrite($error, $txt);

            throw new Exception("non garçon");
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users";

        $done = $this->bdd->query($sql);

        return $done->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser(Users $user): void
    {

        $pseudo = $user->getPseudo();
        $password = $user->getPassword();

        $sql = $this->bdd->prepare("INSERT INTO users (email, mdp) VALUES (:pseudo, :pass)");
        $sql->bindParam(":pseudo", $pseudo);
        $sql->bindParam(":pass", $password);
        $sql->execute();
    }

    public function userConnect($param = [])
    {
        $users = $this->getAll();

        foreach ($users as $user) {
            if ($param["user"] == $user['email'] && password_verify($param["pass"], $user["mdp"])) {
                return $user;
            }
        }
    }

    public function modifie($param = []): void
    {
        $sql = $this->bdd->prepare("UPDATE post SET contenu = : contenu WHERE id = :id");
        $sql->bindParam(":contenu", $param["contenu"]);
        $sql->bindParam(":id", $param["id"]);
        $sql->execute();
    }
}
