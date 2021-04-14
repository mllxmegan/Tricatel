<?php

require_once 'config.php';
require 'delete.php';

$plat= $bdd->query('SELECT * FROM plat ORDER BY id_plat DESC');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <header id="baniere">
        <div class="hero-container">
            <img src="../assets/img/bg1.png" class="img_logo w-100" alt="">
        </div>
        <div class="buttons d-flex justify-content-between">
        <div class="button mt-3 ms-4">
        <a class="btn btn-secondary" href="admin.php" role="button">Retour</a>
        </div>
        <div class="button mt-3 me-4">
        <a class="btn btn-danger" href="deconnexion.php" role="button">Se déconnecter</a>
        </div>
        </div>
        <h1 class="text-center py-4"> Liste des produits </h1>
    </header>

    <div class="container">
        <div class="row">
            
                <div class="col-12 align-content-center filtre d-flex flex-column py-3 flex-sm-wrap rounded shadow">

                    <h2 class="text-center pb-3 text-decoration-underline">Filtrer par :</h2>
                    <div class="type_ d-flex justify-content-center pb-3 flex-sm-wrap">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck1">Plat salé</label>

                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck2"> Plat sucré</label>

                            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck3">Petit déjeuner</label>

                            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck4">Entrée</label>
                
                    </div>
                 </div>
        
                    <div class="regime d-flex justify-content-center pb-3 flex-sm-wrap">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck5">Végétarien</label>

                            <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck6">Végétalien</label>

                            <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck7">Fléxitarien</label>
                        
                        </div>
                    </div>

                    <div class="continent d-flex justify-content-center pb-3 flex-sm-wrap">

                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck8">Asiatique</label>

                            <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck9">Européen</label>

                            <input type="checkbox" class="btn-check" id="btncheck10" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck10">Américain</label>
                        </div>
                    </div>
            </div>
</div>

        <div class="row mx-5-lg pt-5">

<?php
while ($a = $plat->fetch()){
?>
    <div class=" col-12 col-md-6 col-lg-4 ">
        <div class="card plat" style="width: 18rem; height:28rem;">
            <img src="<?= $a['url_image'] ?>" class="card-img-top img_plat" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $a['nom_plat']?></h5>
                <p class="card-text"><?= $a['description'] ?></p>
                <a href="admin.php?edit=<?= $a['id_plat'] ?>" class="btn btn-primary">Mofifier</a>
                <a href="delete.php?id=<?= $a['id_plat'] ?>" class="btn btn-danger" name="delete">Supprimer</a>
            </div>
        </div>

    </div>
<?php } ?>

            </div>

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   
</body>
</html>