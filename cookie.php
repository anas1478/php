<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php
        // setcookie("myCookie","contenuCookie",time()+31536000)
        if(isset($_GET['pays'])) {
            $pays = $_GET['pays'];
         } elseif (isset($_COOKIE['pays'])) {
            $pays = $_COOKIE['pays'];
         } else {
            $pays = "fr";
         }
         
         $expiration = 365*24*3600;
         setcookie("pays", $pays, time()+$expiration);
         
         switch ($pays) {
            case 'fr':
            echo "<p>Bienvenue dans mon site web";
            break;
            case 'en':
            echo "<p>Welcome to my website";
            break;
            case 'arabe':
            echo "<p>salam a sahbi";
            break;
            default:
            echo "<p>Bienvenue dans mon site web";
            break;
         }
        ?>
        <ul>
            <li><a href="?pays=fr">francais</a></li>
            <li><a href="?pays=arabe">arabe</a></li>
            <li><a href="?pays=en">en</a></li>
    
        </ul>
</body>
</html>