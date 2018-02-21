<!DOCTYPE html>

<html>
	<head>
		<title>Exercice1</title>
		<meta charset="utf-8" />
		<?php $bdd = new PDO('mysql:host=localhost;dbname=exo;charset=utf8', 'root', ''); ?>
	</head>
	
	<body>
	
	<h1> Bonjour <?php echo $_POST['prénom'] ?> </h1>
	<p> Voici la réponse à votre requète: Tableau des équipes, et des coureurs par équipe</p>
	<table>
		<thead>
			<tr>
				<th>Equipe</th>
				<th> Coureur </th>
			</tr>
		</thead>
		<tbody<
		<?php 	
			$req1 = $bdd->query('SELECT coureur.nom,coureur.equipe_id FROM coureur'); ;
				
			while ($donnees = $req1->fetch())
			{
			?>
				<tr>
						
					<td><?php echo "Equipe" . $donnees['equipe_id'] ?></td>
					<td><?php echo $donnees['nom'] ?></td>
					
				</tr>
			<?php 
			}
				
			$req1->closeCursor()
		?>
		</tbody>
	</table>
	<a href="nouveau document texte.php" > Retour à la page d'accueil </a>
	</body>
</html>