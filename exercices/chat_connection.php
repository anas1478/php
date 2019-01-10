<form action="" method="post">
    <label for="">Pseudo : </label><br>
    <input type="text" name="user" id=""><br>
    <label for="">Message : </label><br>
    <textarea name="msg" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" value="Envoyer" name="submit">
</form>

<?php
error_reporting(0);
try {
    $db = new PDO("mysql:host=localhost;dbname=chat;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}


if($_POST['submit']) {
if(isset($_POST['user']) && isset($_POST['msg'])) {
    $q = $db->prepare("INSERT INTO messages (msg, user, date) VALUES (:msg, :pseudo,NOW())");
    $q->execute(array(
        ':msg' => htmlspecialchars($_POST['msg']),
        ':pseudo' => htmlspecialchars($_POST['user'])
    ));
    
}
$_POST = array();
}
$query2 = $db->query("SELECT msg, user, date from messages");

while($res = $query2->fetch()) {
    $content .= "Message de : " . $res['user'] .  "<br>" . "Contenu du message : " . $res['msg'] . "<br>" . "Date du message : " . $res['date'] . "<br>";
}

?>

<div class="chat">
    <?php echo $content ?>
</div>