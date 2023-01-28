<?php
require_once("Model/Model_chat.php");

class Chat_Controller
{

    public $model_chat;
    public function __construct()
    {
        $this->model_chat = new Model_chat();
        $this->model_chat->init();
    }
    public function chat($id, $message)
    {

        // session_start();
        // echo($_SESSION['id']);
        $this->model_chat->insert_chat($id, $message);
        // $this->model_chat->insert_chat($_SESSION['id'], $_POST['message']);

    }

    public function getMessage()
    {
        $chats = $this->model_chat->getChat();
        // header('Location: chat.php');
        return $chats;
    }
}
