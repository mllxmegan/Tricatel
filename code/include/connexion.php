<?php require "connexion_traitement.php"; ?>

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
    <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
    <title>Tricatel</title>
</head>

<body>  
    <!-- BANIERE -->
    <header id="baniere">
        <div class="hero-container">
            <img src="../assets/img/bg1.png" class="img_logo w-100" alt="">
        </div>
        <!-- MESSAGE ERREUR -->
        <?php if (!empty($errors)) : ?>
            <div class="alert">
                <p><b>Votre identifiant ou votre mot de passe est incorrect</b></p>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><i class="fas fa-times-circle favicon-error"></i><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="button mt-3 ms-4">
            <a class="btn btn-secondary" href="../index.php" role="button"><i class="fas fa-arrow-left"></i> Retour</a>
        </div>
        <h1 class="text-center py-4"> Accès à la gestion administrateur</h1>
    </header>

    <div class="container">
        <div class="col-12 d-flex justify-content-center mb-4">

            <form action="" method="post" class="w-50">
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Nom d'utilisateur :</label>
                    <input type="text" id="login" name="username" class="form-control" placeholder="Votre nom d'utilisateur...">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputPassword1">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe ...">
                </div>
                <div class="form-group d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-success">Connexion</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>