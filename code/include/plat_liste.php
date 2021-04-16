<?php

require_once 'config.php';
require 'delete.php';

$plat= $bdd->query('SELECT * FROM plat ORDER BY id_plat DESC');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
<link rel="manifest" href="../assets/favicon/site.webmanifest">
<link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="../assets/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="../assets/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Tricatel</title>
</head>
<body>

    <header id="baniere">
        <div class="hero-container">
            <img src="../assets/img/bg1.png" class="img_logo w-100" alt="">
        </div>
        <nav class="navbar navbar-expand-lg bg-light navbar-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around " id="navbarSupportedContent">
      <ul class="navbar-nav py-3 px-4">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin.php"><i class="fas fa-plus"></i> Ajouter un produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="plat_liste.php"><i class="fas fa-edit"></i> Gestion des produits</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </li>
    </div>
  </div>
</nav>
        
    </header>

    <h1 class="text-center pt-5 pb-3"> Liste des produits </h1>
    <div class="container">
      
        <div class="row mx-5-lg pt-5">

<?php
while ($a = $plat->fetch()){
?>
    <div class=" col-12 col-md-6 col-lg-4 d-flex">
        <div class="card plat" style="width: 20rem; height:auto;">
            <img src="<?= $a['url_image'] ?>" class="card-img-top img_plat" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $a['nom_plat']?></h5>
                <p class="card-text"><?= $a['description'] ?></p>
                
            </div>
            <div class="card-footer">
            <div class="card-footer d-flex justify-content-between">
                        <p class="card-text tag"><i class="fas fa-tag"></i> <?=$a['type'] ?> </p>
                        <p class="card-text tag"><i class="fas fa-tag"></i> <?=$a['regime'] ?> </p>
                        <p class="card-text tag"><i class="fas fa-tag"></i> <?=$a['origine'] ?></p>
                    </div>
                    <div class="buttons d-flex justify-content-around ">
                    <a href="admin.php?edit=<?= $a['id_plat'] ?>" class="btn btn-primary me-2"><i class="fas fa-edit"></i>Mofifier</a>
                    <a href="delete.php?id=<?= $a['id_plat'] ?>" class="btn btn-danger" name="delete"><i class="fas fa-trash"></i> Supprimer</a>
                    </div>
                    </div>
        </div>

    </div>
<?php } ?>

            </div>

        </div>

    </div>

<script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   
</body>
</html>