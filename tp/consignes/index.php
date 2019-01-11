<?php


require_once 'header.php';




?>




<div class="container">
  <div class="row justify-content-between d-flex">
    <div class="col"><div class="card" style="width: 25rem;">
  <img src='img/rome.jpg' class="card-img-top" alt="rome">
  <div class="card-body">
    <h5 class="card-title">Formule Rome</h5>
    <p class="card-text">Tomates buratina <br> Rizotto aux asperges <br> Panna cotta</p>
    <a href="commande.php?cmd=menu1" class="btn btn-info col-12">Choisir</a>
  </div>
</div>
</div>
    <div class="col"><div class="card" style="width: 25rem;">
  <img src="img/nyork.jpg" class="card-img-top" alt="nyork">
  <div class="card-body">
    <h5 class="card-title">Formule New-York</h5>
    <p class="card-text">César salade <br> Cheese burger <br> Cheescake</p>
    <a href="commande.php?cmd=menu2" class="btn btn-danger col-12">Choisir</a>
  </div>
</div></div>
    <div class="w-100"></div>
    <div class="col"><div class="card" style="width: 25rem;">
  <img src="img/delhi.jpg" class="card-img-top" alt="delhi">
  <div class="card-body">
    <h5 class="card-title">Formile Delhi</h5>
    <p class="card-text">Poppadoms <br>Agneau byriani <br>Lassi mangue</p>
    <a href="commande.php?cmd=menu3" class="btn btn-warning col-12">Choisir</a>
  </div>
</div></div>
    <div class="col"><div class="card" style="width: 25rem;">
  <img src="img/hanoi.jpg" class="card-img-top" alt="hanoi">
  <div class="card-body">
    <h5 class="card-title">Formule Honoi</h5>
    <p class="card-text">Nems aux crevettes <br>
  Poulet saté <br>Perles de coco</p>
    <a href="commande.php?cmd=menu4" class="btn btn-primary col-12">Choisir</a>
  </div>

  </div>
</div>

<?php
require_once 'footer.php';
?>