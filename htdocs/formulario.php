<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form  method="POST" action="login.php" >
		Email:<br/>
		<input type="email" name="email"/> <br/><br/>

		Senha:<br/>
		<input type="password" name="senha"/><br/><br/>

		<input type="submit" value="Entrar"/>

</form>



</body>
</html>

