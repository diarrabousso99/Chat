<?php

class User{
    public $pseudo;
    public $password;

    public function __construct($pseudo, $password){
        $this->pseudo=$pseudo;
        $this->password=$password;
    }

    public function getPseudo(){
        return $this->pseudo;
    }
    public function getPassword(){
        return $this->password;
    }
   
}

?>