<?php

class livres
{

    private $book;
    private $titre;

    private $contenu;

    private $auteur;

    private $id;

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
    public function setId($id){
        $this->id = $id;
    }
    public function getId()
    { return $this->id;

   }
}