<?php


class book extends bdd
{
    private $bdd;
    public function __construct() {
   
    $this->bdd = $this->connect();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM book";
        $result = $this->bdd->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
