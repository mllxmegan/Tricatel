<?php
require_once 'config.php';

if(isset($_GET['id_plat']) AND !empty($_GET['id_plat'])) {
    $get_id=htmlspecialchars($_GET['id_plat']);

    $plat= $bdd->prepare('SELECT * FROM plat WHERE id_plat = ?');
    $plat->execute(array($get_id));

    if($plat->rowCount() == 1){
        $plat = $plat->fetch();
        $nom_plat = $plat['nom_plat'];
        $url_image = $plat['url_image'];
        $description = $plat['description'];

    } else {
        die('Ce plat n\'existe pas !');
    }

} else {
    header('Location : ../index.php');

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    


        
        <div class="row mx-5-lg pt-5">

            <div class=" col-12 col-md-6 col-lg-4 ">
                <div class="card plat" style="width: 18rem;">
                    <img src="<?= $url_image ?>" class="card-img-top img_plat" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $nom_plat ?></h5>
                        <p class="card-text"><?= $description ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

            </div>









