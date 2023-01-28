<?php
require_once("Controller/Chat_Controller.php");
session_start();
$pseudo = $_SESSION['pseudo'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/chatt.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <style>

    </style>
    <script src="jquery.min.js"></script>
    <script src="data.js"></script>

    <title>Document</title>
</head>

<body>
    <h1>Messagerie Instannee</h1>
    <div class="container">

        <div  id="contenu"></div>
    </div>
    <form action="#" method="post">

        <input type="text" class="pseudo" value="<?php echo $pseudo ?>" hidden>
        <input type="text" class="id" value="<?php echo $id ?>" hidden>
        <input type="text" class="form-control message" autofocus placeholder="message" name="message">
        <input type="submit" class="send" name="send" value="Send">

    </form>
    <script src="asset/js/bootstrap.bundle.min.js"></script>

</body>
</html>