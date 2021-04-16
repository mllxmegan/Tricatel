<?php

require_once 'include/config.php';

$plat = $bdd->query('SELECT * FROM plat ORDER BY id_plat DESC');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
    <title>Tricatel</title>
</head>

<body>
<!-- BANIERE -->
    <header id="baniere">
        <div class="hero-container">
            <img src="assets/img/bg1.png" class="img_logo w-100" alt="">
        </div>
        <div class="button d-flex flex-row-reverse mt-3 me-4">
            <a class="btn btn-success" href="include/connexion.php" role="button">Se connecter</a>
        </div>
        <h1 class="text-center py-4"> Nos plats du moment </h1>
    </header>

    <div class="container">
        <!-- FILTRE -->
        <div class="row">

            <div class="col-12 align-content-center filtre d-flex flex-column py-3 flex-sm-wrap rounded shadow">

                <h2 class="text-center pb-3 text-decoration-underline">Filtrer par :</h2>
                <div class="type_ d-flex justify-content-center pb-3 flex-sm-wrap">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck1"> Plat salé</label>

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

        <!-- CARD PLAT -->
        <div class="row mx-5-lg pt-5">

            <?php
            while ($a = $plat->fetch()) {
            ?>
                <div class=" col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card plat" style="width: 20rem; height:28rem;">
                        <img src="<?= $a['url_image'] ?>" class="card-img-top img_plat" alt="image du plat">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $a['nom_plat'] ?></h5>
                            <p class="card-text"><?= $a['description'] ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="card-text tag"><i class="fas fa-tag"></i> <?= $a['type'] ?> </p>
                            <p class="card-text tag"><i class="fas fa-tag"></i> <?= $a['regime'] ?> </p>
                            <p class="card-text tag"><i class="fas fa-tag"></i> <?= $a['origine'] ?></p>
                        </div>
                    </div>

                </div>
            <?php } ?>

        </div>

    </div>

    </div>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>