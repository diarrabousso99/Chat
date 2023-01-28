
<?php

require_once("Controller/Chat_Controller.php");
$controller = new Chat_Controller();
$val =    $controller->getMessage();

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
echo(json_encode($val));
// echo (json_encode($val['items'][0]->getPseudo()));

?>

