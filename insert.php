<?php 
require_once("Controller/Chat_Controller.php");
session_start();
$message= isset($_POST['message']) ? $_POST['message'] :null;
$pseudo=isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
$controller = new Chat_Controller();
$controller->chat($pseudo,$message);
?>