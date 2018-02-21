<!DOCTYPE html>

<html>
	<head>
		<title>Exercice1</title>
		<meta charset="utf-8" />
	</head>
	
	<body>
	
	<h1>Bonjour</h1>
	
	<p> Veuillez remplir le formulaire ci-dessous </p>
	<form action="action.php" method=post >
		<label for="prénom"> Prénom:</label>
		<input type="text" name="prénom" />
		<p>Quelle requète?</p>
		<input type="radio" name="requete" value="1" id="1" /> <label name="label" for="1"> Liste de tous les coureurs (nom,prénom)</label> </br>
		<input type="radio" name="requete" value="2" id="2" /> <label for="2"> Tableau des équipes, et des coureurs par équipe</label> </br>
		<input type="radio" name="requete" value="3" id="3" /> <label for="3"> La liste des étapes, et pour chaque étape la liste des courreurs y ayant participé, classés par ordre d'arrivée</label></br>
		<input type="submit" value="envoyer" />
	</form>
	
	</body>
</html>