<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La methode POST</title>
</head>
<body>
    <div class="row">
        <div class="col-1"></div>
<form class= "clo-9" method='post' action='formulaire.php' >
  <div class="form-group ">
    <label for="exampleInputEmail1">nom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nom" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">prenom</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="prenom" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">adresse</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="14 rue dupont" name="adr">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">code postal</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="78000" name="cp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">ville</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Versaille" name="ville">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php

//  if(isset($_POST)&& !empty($_POST)){
//  $myfile = fopen("newfile.txt", "a+") or die("Unable to open file!");
//  if(){

//  $txt =htmlspecialchars($_POST['nom']).PHP_EOL.htmlspecialchars($_POST['prenom']).PHP_EOL.htmlspecialchars($_POST['mdp']).PHP_EOL.htmlspecialchars($_POST['adr']).PHP_EOL.htmlspecialchars($_POST['cp']).PHP_EOL.htmlspecialchars($_POST['ville']).PHP_EOL.htmlspecialchars($_POST['email']);
//  fwrite($myfile, $txt);
//  fclose($myfile);
//  }
//  }

    
    $content = "";
    $informations ="";

    if($_POST){

        $file = fopen("contact.txt", "a+") or die ("file not open");

        foreach ($_POST as $key => $value) {
            if(empty($value)){
                $content .= "<div class=\"alert alert-danger\"> veuillez remplir les champs " . $key . "</div>";
            } else{
                $informations = $key . " : "  . strip_tags($value) . PHP_EOL;
                fputs($file, $informations);
            }
        
        }

        fputs($file, "--------------" . PHP_EOL);

        fclose($file);
    
    }
    

?> 

</body>
</html>