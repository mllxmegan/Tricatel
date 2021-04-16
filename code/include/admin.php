<?php 
    require_once 'config.php';
	session_start(); 
	if(!isset($_SESSION['auth'])){
		header('Location: connexion.php');
		exit();
	}
    // PARTIE EDITION
    $mode_edition = 0;
    if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
        $mode_edition = 1;
        $edit_id = htmlspecialchars($_GET['edit']);
        $edit_plat = $bdd->prepare('SELECT * FROM plat WHERE id_plat= ?');
        $edit_plat->execute(array($edit_id));

        if($edit_plat->rowCount() == 1) {

            $edit_plat = $edit_plat->fetch(); 

        } else {
            die('Erreur: Le plat n\'existe pas...');
        }
    }

    // PARTIE CREATION
    if(isset($_POST['nom_plat'],$_POST['description'],$_POST['type'],$_POST['origine'],$_POST['regime'], $_POST['url_image'])) {
        if(!empty($_POST['nom_plat']) AND !empty($_POST['description']) AND !empty($_POST['type'])AND !empty($_POST['origine']) AND !empty($_POST['regime']) AND !empty($_POST['url_image'])) {
        
        $nom_plat = htmlspecialchars($_POST['nom_plat']);
        $description = htmlspecialchars($_POST['description']);
        $type = htmlspecialchars($_POST['type']);
        $origine = htmlspecialchars($_POST['origine']);
        $regime = htmlspecialchars($_POST['regime']);
        $url_image = htmlspecialchars($_POST['url_image']);

        if($mode_edition == 0 ){

        $ins = $bdd->prepare('INSERT INTO plat (nom_plat,description,type,origine,regime,url_image) 
            VALUES (?, ?, ?, ?, ?, ?)');
        $ins->execute(array($nom_plat, $description, $type, $origine, $regime, $url_image));
        $error= 'Votre plat a été ajouté <i class="fas fa-check"></i>';
    } else {
            $update= $bdd->prepare('UPDATE plat SET nom_plat= ?, description= ?, type= ?, origine= ?, regime= ?,url_image=? WHERE id_plat= ?');
            $update->execute(array($nom_plat, $description, $type, $origine, $regime, $url_image, $edit_id));

            header('Location: plat_liste.php');
            
        }

        } else {
           $error = 'Veuillez remplir tous les champs'; 

        }
    }

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
    <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
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
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav py-3">
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

    <div class="container">
    <h2 class="text-center my-4">
    <?php 
    if($mode_edition == 0)
        {echo 'Ajouter un produit';}
        else
        {echo 'Modifier un produit';}
        ?>
    </h2>

    <h3 class="text-center message"><?php if (isset($error)) {echo $error;} ?></h3>
        <div class="col-12 d-flex justify-content-center">

        <form action="" method="post" class="w-50">
                <div class="form-row">

                    <div class="form-group mb-3">
                        <label for="inputTitle">Nom du plat :</label>
                        <input type="text" class="form-control" id="inputTitle" name="nom_plat" placeholder="Nom du plat..." <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['nom_plat'] ?>"<?php } ?>>
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputDescription">Description du plat:</label>
                        <textarea class="form-control" id="inputDescription" name="description" placeholder="Description du plat..."> <?php if($mode_edition == 1) { ?> <?= $edit_plat['description'] ?> <?php } ?> </textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputTypePlat">Type de plat : </label>
                        <select class="form-control" name="type" id="inputTypePlat">
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['type'] ?>"<?php } ?>>Plat salé</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['type'] ?>"<?php } ?>>Plat sucré</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['type'] ?>"<?php } ?>>Petit déjeuner</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['type'] ?>"<?php } ?>>Entrée</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputOrigine">Origine du plat : </label>
                        <select class="form-control" name="origine" id="inputOrigine">
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['origine'] ?>"<?php } ?>>Européen</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['origine'] ?>"<?php } ?>>Asiatique</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['origine'] ?>"<?php } ?>>Américain</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputRegime">Régime alimentaire : </label>
                        <select class="form-control" name="regime" id="inputRegime">
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['regime'] ?>"<?php } ?>>Végétarien</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['regime'] ?>"<?php } ?>>Végétalien</option>
                            <option <?php if($mode_edition == 1) { ?> value="<?= $edit_plat['regime'] ?>"<?php } ?>>Fléxitarien</option>
                        </select>
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="inputImage">Image du plat : </label>
                        <input type="url" class="form-control" name="url_image" id="inputImage" placeholder="Url de l'image..."<?php if($mode_edition == 1) { ?> value="<?= $edit_plat['url_image'] ?>"<?php } ?>>
                    </div>

                    <div class="form-group d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-success">
                    <?php 
                      if($mode_edition == 0)
                       {echo 'Ajouter un produit';}
                      else
                       {echo 'Modifier un produit';}
                    ?>
                    </button>
                </div>            
                </div>
    
            </form>
            <br>
            
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>