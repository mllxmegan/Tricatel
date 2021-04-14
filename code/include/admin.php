<?php 
    require_once 'config.php';
	session_start(); 
	if(!isset($_SESSION['auth'])){
		header('Location: connexion.php');
		exit();
	}
    
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
        $error= 'Votre plat a été ajouté';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
    <header id="baniere">
        <div class="hero-container">
            <img src="../assets/img/bg1.png" class="img_logo w-100" alt="">
        </div>
        <div class="button d-flex flex-row-reverse mt-3 me-4">
        <a class="btn btn-danger" href="deconnexion.php" role="button">Se déconnecter</a>
        </div>
        <h1 class="text-center"> Gestion Administrateur </h1>
        <div class="button d-flex justify-content-center mb-3 ">
        <a class="btn btn-primary" href="plat_liste.php" role="button">Accéder aux articles</a>
        </div>
    </header>

    <div class="container">
    <h2 class="text-center my-4">Ajouter ou Modifier un plat</h2>
        <div class="col-12 d-flex justify-content-center">
        
        <form action="" method="post" class="w-50">
                <div class="form-row">

                    <div class="form-group mb-3">
                        <label for="inputTitle">Nom du plat</label>
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
                    <button type="submit" class="btn btn-success">Modifier le plat</button>
                </div>
                    

                </div>
        

            </form>
            <br>
            <?php if (isset($error)) {echo $error;} ?>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>