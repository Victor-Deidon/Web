<!DOCTYPE html>

<html>
	<head>
		<title>Exercice1</title>
		<meta charset="utf-8" />
		<?php $bdd = new PDO('mysql:host=localhost;dbname=exo;charset=utf8', 'root', ''); ?>
	</head>
	
	<body>
	
	<h1> Bonjour <?php echo $_POST['prénom'] ?> </h1>
	<p> Voici la réponse à votre requète:  La liste des étapes, et pour chaque étape la liste des courreurs y ayant participé, classés par ordre d'arrivée </p>
	<div>
		<?php 	
			$req1 = $bdd->query('SELECT numero,etape.villeArrivee,etape.villeDepart FROM etape'); ;
				
			while ($donnees = $req1->fetch())
			{
				?> <h1> Etape numero <?php echo $donnees['numero'] ?> <?php echo $donnees['villeDepart'] . "->" . $donnees['villeArrivee'] ?>  </h1>
				
				<ul>
				<?php
				$req2 = $bdd->prepare('SELECT resultat.temps,coureur.nom,coureur.prenom FROM resultat,coureur WHERE coureur.id=resultat.coureur_id AND resultat.etape_id=? ORDER BY resultat.temps '); 
				$req2->execute(array($donnees['numero']));
				
				while ($don = $req2->fetch())
				{
				if(isset($don['temps']))
				{
				?>
				<li><?php echo $don['nom'] . " " . $don['prenom'] . ":" . $don['temps'] ?></li>
				<?php
				}
				else{ 
				?>
				<p> Pas encore de résultats </p>
				<?php
				}
				}
				$req2->closeCursor();
				?>
				</ul>
				<?php
			}
				
			$req1->closeCursor()
		?>
		
	</ul>
	<a href="nouveau document texte.php" > Retour à la page d'accueil </a>
	</body>
</html>