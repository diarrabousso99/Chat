<?php
require_once("Controller/User_Controller.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Formulaire</title>
	<link rel="stylesheet" type="text/css" href="style/stylee.css">
	<script src="jquery.min.js"></script>
	<!-- <script src="data.js"></script> -->
</head>

<body>
	<form method="post" id="form_creation" action="#">
		<div class="login_box">
			<h1>Création de compte</h1>
			<div class="text_box">
				<input type="text" name="login" id="login" placeholder="donner un login">
			</div>
			<div class="text_box">
				<input type="password" name="password" id="password" placeholder="password">
			</div>
			<input type="submit" id="create" class="btn" name="add" value="Creer un compte">
			<a href="index.php" style="margin-left: 100px; color:green"> J'ai deja un compte
			<!-- <input type="button" class="btn2" name="creer" value="Creer un compte"> -->
			
		</a>
		</div>

	</form>
	
	<?php
	if(isset($_POST['add'])){		
		$controller = new User_Controller();
		$controller->invoke();
	}
	?>
</body>


</html>