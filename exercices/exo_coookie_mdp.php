<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="exo_coookie_mdp.php" method="post">
   <input type="text" name="user" id="">
   <input type="password" name="mdp" id="">
   <input type="submit" name="valider" value="Connexion">
</form>
<?php

if(isset($_POST['valider'])) {
   setcookie("user", $_POST['user'], time()+5536000);
   setcookie("password", $_POST['mdp'], time()+5536000);
}
?>
</body>
</html>