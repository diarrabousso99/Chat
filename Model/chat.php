<?php

class Chat{
    public $pseudo;
    public $message;
    public $date_message;
    public $image;

    public function __construct($pseudo, $message , $date_message,$image){
        $this->pseudo=$pseudo;
        $this->message=$message;
        $this->date_message=$date_message;
        $this->image=$image;
    }

    public function getPseudo(){
        return $this->pseudo;
    }
    public function getMessage(){
        return $this->message;
    }

    public function getDate(){
        return $this->date_message;
    }

    public function getImage(){
        return $this->image;
    }
}

?>