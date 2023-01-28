<?php
require_once("Model/chat.php");

class Model_chat{
    private static $bd;
    //connexion a la base de donnees
    public static function init(){
        self::$bd = new PDO('mysql:host=localhost;dbname=minichat', 'root', '');
	//creer une table

	$table = "CREATE TABLE IF NOT EXISTS Chat(
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
			user INT UNSIGNED,
			message varchar(1000),
			date_message TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			FOREIGN KEY(user) REFERENCES Utilisateur(id)
			)";
	self::$bd->exec($table);
    }

    //recuperation d'un pseudo pour un password

    public static function getChat(){

		$req = self::$bd->query("SELECT pseudo , message , date_message,image 
          from Utilisateur u, Chat c
		 	where u.id=c.user order By date_message ASC" );
            while ($data=$req->fetch()) {
               $chat['items'][]= new Chat($data['pseudo'],$data['message'],$data['date_message'],$data['image']);
            }
            return $chat;
    } 

    public function insert_chat($pseudo,$message){
        $req = self::$bd->prepare("INSERT INTO Chat (user,message) values (?,?)");
        $req->execute(array($pseudo, $message));
    }

}


?>