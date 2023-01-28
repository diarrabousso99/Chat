
<?php
require_once("../chat/Controller/User_Controller.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="style/stylee.css">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<script src="jquery.min.js"></script>
</head>
<body>
	<form method="post" action="#" >
		<div class="login_box">
			<h1>CHAT INSTANTANEE</h1>
			<div class="text_box">
		<input type="text" name="login" id="login" placeholder="login">
		</div>

		<div class="text_box">
				<input type="password"  name="password" id="password" placeholder="password">
		</div>			
		<input type="submit" class="btn" name="seConnecter" value="Se connecter">
		<a href="creationCompte.php" style="margin-left: 100px; color:red"> J'ai pas de compte
			<!-- <input type="button" class="btn2" name="creer" value="Creer un compte"> -->
			
		</a>		
		</div>

	</form>
	<?php
	if(isset($_POST['seConnecter'])){		
		$controller = new User_Controller();
		$controller->connexion();
	}
	?>
</body>
</html>