<?php 

if(!empty($_POST)){

	require_once 'config.php';

	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	$errors = array();

	if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
		$errors['username'] = "Votre username n'est pas valide";
	} else {
		$requete = $bdd->prepare('SELECT id_user FROM user WHERE username = ?');
		$requete->execute([$_POST['username']]);
		$user = $requete->fetch();
			if($user){
				$errors['username'] = "Ce username est déjà pris";
			}
	

	}

	if(empty($_POST['password']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])){
		$errors['password'] = "Votre mot de passe n'est pas valide";
	}

	// function debug($variable){
	// 	echo '<pre>' . print_r($variable, true) . '</pre>';
	// }

	// debug($errors);

	if(empty($errors)){
		$requete = $bdd->prepare('INSERT INTO user SET username = ?, password = ?');

		$requete->execute([$username, $password]);
		session_start();
		$_SESSION['auth'];
		header('Location: admin.php');
	}
}
?>