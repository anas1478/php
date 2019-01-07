<?php

echo "
    <style>
        body {margin: 0;}
        .connected {font-family: arial;padding: 10px 5px;margin: 25px;background: #ceffce;color:green; font-size: 1rem;border: 1px solid green}
        .denied {font-family: arial;padding: 10px 5px;margin: 25px;background: #ffcece;color:red; font-size: 1rem;border: 1px solid red}
    </style>
    ";

if($_POST) {
    if(htmlspecialchars($_POST['pwd']) == "lepoles") {
        $user = htmlspecialchars($_POST['user']);
        echo 
        "<style>
            form {display:none;}
        </style>";
        echo "<div class='connected'>Bienvenue <strong>$user!</strong> vous pouvez acceder a votre profil</div>";
    } else {
        echo "<div class='denied'>Access interdit!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La methode POST</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="">Pseudo: <input type="text" name="user"></label>
        <label for="">mote de passe: <input type="password" name="pwd"></label>
        <input type="submit" value="Validez!">
    </form>
</body>
</html>