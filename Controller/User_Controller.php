<?php
require_once("Model/Model_user.php");

class User_Controller{

    public $model_user;
    public function __construct()
    {
       $this->model_user=new Model_user();
       $this->model_user->init();
    }

    public function connexion(){
        $this->model_user->log($_POST['login'], $_POST['password']);
    }

    public function invoke(){
        $this->model_user->getPseudo($_POST['login'], $_POST['password'],);
    }
}

?>