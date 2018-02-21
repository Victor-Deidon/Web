<!DOCTYPE html>

<html>
<head>
	<title>
		HappEvent
	</title>
	<meta charset="utf-8"/>

</head>

<body>
    <div class="global">
        <div class="container">
            <header>
                <a href="/vues/accueil.php" class="header_logo" title="HappEvent"><img src="/images/Logo.png"/></a>
                <div class="onglet">
                    <a href="/vues/accueil.php">Accueil</a>
                    <a href="/vues/exploration.php">Recherche</a>   
                    <a href="#">Mes évènements</a>
                    <a href="/vues/Creationevenement.php">Créer un évènement</a>
                    <a href="#">Aide</a>
                </div>
                    
                <?php if (isset($_SESSION['id'])) {
	
?>
<div class="connexion">          
 <div class="qwerty">               
<a  href="entete_logout.php">Deconnexion</a>
</div>                
</div>                 

<?php
}
                 else { 
                ?>
                <div class="connexion">
                <form action=Inscription.php method="post">
                <input id="bouton9" type="submit" value="Inscription" class="bloc123">
                </form> 
                    
                 <form action="entete_connect.php" method="post">
                <input id="mail" type="placeholder" value="email"  name="email" class="bloc1234" >   
                <input id="mdp" type="password" value = "mot de passe" name="mot_de_passe" class="bloc12345" >
                <input id="bouton8" type="submit" value="Connexion" class ="bloc 123456">
                </form>
                
                </div> 
                <?php
                 }
                 ?>
                 
                </div>         
                </header>
                  
        </div>      
    </div>
</body>
</html>