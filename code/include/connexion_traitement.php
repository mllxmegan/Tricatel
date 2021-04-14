<?php

  require 'config.php';

  //function debug
  function debug($variable){
   echo '<pre>' . print_r($variable, true) . '</pre>';
  }

  //création d'un tableau des erreurs de connexion possibles
  $errors = array();


  if(isset($_POST['username']) && isset($_POST['password'])){
    //je récupère le username saisie par l'utilisateur
    $username = $_POST['username'];
    //je récupère les username et mots de passe associés de la bdd
    $requete = $bdd->prepare('SELECT username, password FROM user WHERE username = ?');
    $requete->execute([$_POST['username']]);
    $identification_db = $requete->fetch();

        //je vérifie que le username existe en bdd
        if($identification_db){
          //je vérifie le mot de passe
          if(password_verify($_POST['password'], $identification_db['password'])){
            //si tout est bon, la session peut commencer
            session_start();
            $_SESSION['auth'] = $identification_db;
            header('Location: admin.php');
            exit();
          }  else {
              $errors['error'] = "Votre mot de passe est incorrect";
            } 
        } else {
            $errors['error'] = "Ce username n'est pas enregistré";  
          }
  }

  //  debug($errors);

?>
