<?php



class basedd
{
    private $bdd;

    public function connect()
    {
        try {
            $this->bdd = new PDO("mysql:host=localhost;dbname=newbdd", 'root', '');

            return $this->bdd;
        } catch (PDOException $e) {
            print $e;
        }
    }
    public function addnewser($email, $password)
    {
        $bdn = "INSERT into users(email,mdp) VALUES(:email,:mdp)";

        $don = $this->bdd->prepare($bdn);

        $don->execute(array("email" => $email, "mdp" => $password));
    }
    public function getALL()
    {
        $var1 = "SELECT * FROM users";

        $var3 = $this->bdd->query($var1);

        return $var3->fetchAll(PDO::FETCH_ASSOC);
    }

    public function confirmation($param=[])
    {
        $users = $this->getALL();

        foreach ($users as $user) {
            if ($user["email"] == $param["mail"] && password_verify($param["pass"], $user["mdp"])) {
            return $user;
            }
        }
    }
}
