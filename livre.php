<?php

class livres
{

    private $book;
    private $titre;

    private $contenu;

    private $auteur;

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setContenu($contenu){
        $this->contenu = $contenu;
    }

    public function getContenu()
    {
        return $this->contenu;
    }
    
    public function setAuteur($auteur){
        $this->auteur = $auteur;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }
    

    public function addUser(livres $user)
    {

        $titre = $user->getTitre();
        $contenu = $user->getContenu();
        $auteur = $user->getAuteur();

        $sql = $this->book->prepare("INSERT INTO book (titre, contenu, auteur) VALUES (:titre, :contenu, :auteur)");
        $sql->bindParam(":titre", $titre);
        $sql->bindParam(":contenu", $contenu);
        $sql->bindParam(":auteur", $auteur);
        $sql->execute();
    }

}
