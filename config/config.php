<?php

include('class/users.php');
include('class/livre.php');
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
            if ($param["email"] == $user['email'] && password_verify($param["pass"], $user["mdp"])) {
                return $user;
            }
        }
    }

    public function modifie($param = []): void
    {
        $sql = $this->bdd->prepare("UPDATE book SET titre = :titre, contenu = :contenu, auteur = :auteur WHERE id = :id");
        $sql->bindParam(":titre", $param["titre"]);
        $sql->bindParam(":contenu", $param["contenu"]);
        $sql->bindParam(":auteur", $param["auteur"]);
        $sql->bindParam(":id", $param["id"]);
        $sql->execute();
        
    }
    public function addbooks(livres $user)
    {

        $titre = $user->getTitre();
        $contenu = $user->getContenu();
        $auteur = $user->getAuteur();

        $sql = $this->bdd->prepare("INSERT INTO book (titre, contenu, auteur) VALUES (:titre, :contenu, :auteur)");
        $sql->bindParam(":titre", $titre);
        $sql->bindParam(":contenu", $contenu);
        $sql->bindParam(":auteur", $auteur);
        $sql->execute();
    }

    public function getBooks(): array
    {
        $sql = $this->bdd->prepare("SELECT * from book");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletbook(int $id){
        $sql = $this->bdd->prepare("DELETE from book WHERE id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
}
