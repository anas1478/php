<?php

require_once 'header.php';


if(isset($_GET['cmd'])&& $_GET['cmd'] =='menu1'){
   echo' 
   <div class="card" style="width: 18rem;">
   <img src="..." class="card-img-top" alt="...">
   <div class="card-body">
     <h5 class="card-title">Card title</h5>
     <p class="card-text"></p>
     <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
 </div>

    echo '<h5 class="card-title">Formule Rome</h5>';
}
if(isset($_GET['cmd'])&& $_GET['cmd'] =='menu2'){
    echo'    <h5 class="card-title">Formule New-York</h5>';
}
if(isset($_GET['cmd'])&& $_GET['cmd'] =='menu3'){
echo'<h5 class="card-title">Formile Delhi</h5>';
}
if(isset($_GET['cmd'])&& $_GET['cmd'] =='menu4'){
echo'<h5 class="card-title">Formule Honoi</h5>';
}
require_once 'footer.php';
?>