 
<?php
include('bdd.php');
 
// On vérifie que l'utilisateur a bien envoyé les informations demandées 
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    
	// On vérifie que password et password2 sont identiques
	if($_POST["password"] == $_POST["password2"]){

		// On utilise alors notre fonction password_hash :
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

		// Puis on stock le résultat dans la base de données :
		$query = $bdd->prepare('INSERT INTO membres(username, password_member) VALUES (:username, :password)');
		$query->bindParam(':username', $_POST["username"], PDO::PARAM_STR);
		$query->bindParam(':password', $hash, PDO::PARAM_STR);
		$query->execute();
		header('Location: index.php');
		exit();
	}
}?>