<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="chat.php">

  <div class="form-group">
  <label for="exampleFormControlInput1"></label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="pseudo" placeholder="pseudo">
    <label for="exampleFormControlInput1">ecris quelque chose dans le chat genetal :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="inp" placeholder="bonjour..">
    <br>
    <button type="submit" class="btn btn-primary">envoyer</button>
    <br>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">chat general :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="la"></textarea>
    
  </div>
  <?php
  if(isset($_POST)&& !empty($_POST)){
 $myfile = fopen("chat.txt", "a+") or die("Unable to open file!");

 $txt =htmlspecialchars($_POST['pseudo']). " : " .htmlspecialchars($_POST['inp']) . PHP_EOL;
 fwrite($myfile, $txt);
 fclose($myfile);
 }
 echo inpl ($myfile,200);
?>
</form>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">  
</body>
</html>