<?php
    $servername = 'localhost';
    $dbname = 'tricatel';
    $username = 'root';
    $password = '';

    try{ //creation of the database

        $dbco = new PDO("mysql:host=$servername", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $dbco->exec($sql);
    }

    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    try{ //creation of all my tables

        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $table_user = "CREATE TABLE IF NOT EXISTS user(
            id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password TEXT NOT NULL)";

        $table_plat = "CREATE TABLE IF NOT EXISTS plat(
            id_plat INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom_plat VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            type VARCHAR(255) NOT NULL,
            origine VARCHAR(255) NOT NULL,
            regime VARCHAR(255) NOT NULL,
            url_image VARCHAR(255) NOT NULL)";
       

        $dbco->exec($table_user);
        $dbco->exec($table_plat);
        // echo 'Table "restaurant" bien créée !<br/>';
    }
    
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    // récupérer le nombre de flash en février
    $admin = "
    INSERT INTO user (username, password)
    VALUES
    ('admin', 'password')";

    

    try{
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbco->query($admin);


        if($stmt === false){
        die("Erreur");
        }
      }

      catch (PDOException $e){
        echo $e->getMessage();
      }

?>