<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La methode GET</title>
</head>
<body>
    <?php 

        $contact = array(id=>"75", nom=>"Mohamed AAROUS", age=>'21', tel=>'0784925459');

    ?>
    <a href="cible.php?id=<?= $contact['id'] ?>&nom=<?= $contact['nom'] ?>&age=<?= $contact['age'] ?>&tel=<?= $contact['tel'] ?>">Cliquer ici</a>
</body>
</html>