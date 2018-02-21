<!DOCTYPE html>

<html>
	<head>
		<title>Exercice1</title>
		<meta charset="utf-8" />
		<?php $bdd = new PDO('mysql:host=localhost;dbname=exo;charset=utf8', 'root', ''); ?>
	</head>
	
	<body>
	
	<h1> Bonjour <?php echo $_POST['prénom'] ?> </h1>
	<p> Voici la réponse à votre requète: Liste de tous les coureurs (nom,prénom) </p>
	<ul>
		<?php 	
			$req1 = $bdd->query('SELECT * FROM `coureur`'); ;
				
			while ($donnees = $req1->fetch())
			{
			?>
				<li><?php echo $donnees['nom'] . " " . $donnees['prenom'] ?></li>
			<?php 
			}
				
			$req1->closeCursor()
		?>
		
	</ul>
	<a href="nouveau document texte.php" > Retour à la page d'accueil </a>
	</body>
</html>