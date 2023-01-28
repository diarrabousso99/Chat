<?php
require_once("Model/user.php");
class Model_user
{
    private static $bd;
    //connexion a la base de donnees
    public static function init()
    {
        self::$bd = new PDO('mysql:host=localhost;dbname=miniChat', 'root', '');

        //creer une table
        $table = "CREATE TABLE IF NOT EXISTS Utilisateur(
			id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
			pseudo varchar(20) , 
			password varchar(90),
            image varchar(50))";
        self::$bd->exec($table);
    }

    //recuperation d'un pseudo pour un password

    public  function getPseudo($pseudo, $password)
    {
        $req = self::$bd->prepare("SELECT pseudo, password from Utilisateur
		 	where pseudo=:pseudo");
        $req->execute(array('pseudo' => $pseudo));
        $reponse = $req->fetchAll(PDO::FETCH_ASSOC);
        if (count($reponse) == 0) {
            new User($pseudo, $password);
            return  self::insert_user($pseudo, $password);
        } else {
            echo("<script type='text/javascript'>alert('login existe deja, veuillez en creer un autre')</script>");
         
        }
    }

    public  function log($pseudo, $password)
    {
        session_start();
        $req = self::$bd->prepare("SELECT password, id from Utilisateur
		 	where pseudo=:pseudo");
        $req->execute(array('pseudo' => $pseudo));
        $reponse = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($reponse as $value) {
            $mdp = $value['password'];
            $id = $value['id'];
        }
        if ($mdp == sha1($password)) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['id'] = $id;
            // echo($_SESSION['pseudo']);
            header('Location: chat.php');
        } else {
            echo ("<script type='text/javascript'>alert('Mots de passe ou login incorect')</script>");
        }
    }

    public function insert_user($pseudo, $password)
    {
        $req = self::$bd->prepare("INSERT INTO Utilisateur (pseudo,password,image) values (?,?,?)");
        $mdp = sha1($password);
        $image = "person-icon.png";
        $req->execute(array($pseudo, $mdp, $image));
        new User($pseudo, $password);
        self::alert();
    }
    function alert()
    {
        echo ("<script type='text/javascript'>alert('Compte cree avec succes, veuillez vous connecter')</script>");
        // header('Location: index.php');
    }
}
