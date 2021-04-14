<?php 
    require_once 'config.php';
	session_start(); 
	if(!isset($_SESSION['auth'])){
		header('Location: connexion.php');
		exit();
	}
    

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $suppr_id = htmlspecialchars($_GET['id']);
        
        $suppr = $bdd->prepare('DELETE FROM plat WHERE id_plat = ?');
        $suppr->execute(array($suppr_id));

        header('Location: http://localhost/Evaluation_php/code/include/plat_liste.php');
    }

?>