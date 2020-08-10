<?php


	// On importe le fichier contenant les informations de connexion à la base de données
    include('bdd.php');


	// On vérifie que le visiteur a correctement saisi puis envoyé le formulaire
    	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pwd']) && !empty($_POST['pwd']))) 
	    {

			$username = htmlspecialchars($_POST['login']);
	    	$password = htmlspecialchars($_POST['pwd']);

	    	$sql = "SELECT * FROM membres WHERE username = '$username' ";
	    	$result = $bdd->prepare($sql);
	    	$result->execute();

	    	if($result->rowCount() > 0)
	    	{
	    		$data = $result->fetchAll();
	    		if (password_verify($password, $data[0]["password_member"]))
	    		{
					session_start();
					$_SESSION['login'] = $username;
					header('Location: IndexConnected.php');
					
				}
			}

			else

			{
				echo 'Indentifiants invalides.';?><br />
				<a href="index.php">Cliquez ici pour réessayer.</a>

				<?php

			}
		}
		else

			{
				echo 'Veuillez indiquer vos identifiants de connexion.';?><br />
				<a href="index.php">Cliquez ici pour réessayer.</a>

				<?php
			}


?>
