<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <title>mes évènements</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include "entete.php" ?>
        <h1>Mes évènements</h1>              
        <lien><a href="création d'évènement"><img src="créerévènement.png"></a></lien> <div style="text-align: right"><img src="logo.png" /></div>
		<?php
			try
				{


					$bdd = new PDO('mysql:host=localhost;dbname=BDD;charset=utf8', 'root', '');
				}
				catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}
			$évènementscréés = $bdd->query('SELECT * FROM ');
		
		?>
		<span style="float:left;"><h2>évènements que j'ai créé</h2>
		                <?php 
                    
                    
                    $req = $bdd->query('SELECT  evenement.id_evenement,evenement.titre, evenement.description, fichier_multimedia.id_fichier_multimedia 
                    FROM evenement                  
                    JOIN fichier_multimedia
                    ON evenement.id_evenement=fichier_multimedia.evenement_id_evenement
                    WHERE fichier_multimedia.ordre=0 
                    AND evenement.utilisateur_id_utilisateur=$_SESSION['id']'); 
                    
                    $i=0;
                    while ($donnees = $req->fetch())
                        
                    {
                        $source = imagecreatefromjpeg("images/$donnees[id_fichier_multimedia].jpg");
					    $destination = imagecreatetruecolor(150, 150); 
					    $largeur_source = imagesx($source);
					    $hauteur_source = imagesy($source);
					    $largeur_destination = imagesx($destination);
					    $hauteur_destination = imagesy($destination);
					    imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
                        
                        $imgevent="imgevent".$i.".jpg";
					    imagejpeg($destination, $imgevent);
                        $i=$i + 1
                        
                ?>
                
                    <a href="<?php echo "app/Evenement.php?event=".$donnees['id_evenement'];?>">
                    <div class="event">

                        <div class="image">

                            <img src="<?php echo $imgevent ;?>"/>

                        </div>

                        <div class="titre">

                             <h3><?php echo $donnees['titre'];?> </h3>

                        </div>

                        <div class="content">

                           <p><?php echo $donnees['description'];?></p>

                        </div>
                    </div>
                    </a>
                <p><a href="modifier" class="myButton">modifier l'évènement</a> </p>
                <?php
                   }
                    $req->closeCursor(); 
                ?>
	</span>
	
	<span style="float:right;"><h2>évènements que j'ai rejoints</h2>
		                <?php 
                    
                    
                    $req = $bdd->query(' SELECT evenement.id_evenement, evenement.titre, evenement.description, fichier_multimedia.id_fichier_multimedia 
                    FROM suis_invite_participe_signale 
                    JOIN evenement
                    ON evenement.evenement_id=suis_invite_participe_signale.evenement_id_evenement
                    JOIN fichier_multimedia
                    ON suis_invite_participe_signale.evenement_id_evenement=fichier_multimedia.evenement_id_evenement
                    WHERE fichier_multimedia.ordre=0
                    AND suis_invite_participe_signale.type=2 
                    AND suis_invite_participe_signale.utilisateur_id_utilisateur=$_SESSION['id']'); 
                    
                    $i=0;
                    while ($donnees = $req->fetch())
                        
                    {
                        $source = imagecreatefromjpeg("images/$donnees[id_fichier_multimedia].jpg");
					    $destination = imagecreatetruecolor(150, 150); 
					    $largeur_source = imagesx($source);
					    $hauteur_source = imagesy($source);
					    $largeur_destination = imagesx($destination);
					    $hauteur_destination = imagesy($destination);
					    imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
                        
                        $imgevent="imgevent".$i.".jpg";
					    imagejpeg($destination, $imgevent);
                        $i=$i + 1
                        
                ?>
                
                    <a href="<?php echo "app/Evenement.php?event=".$donnees['id_evenement'];?>">
                    <div class="event">

                        <div class="image">

                            <img src="<?php echo $imgevent ;?>"/>

                        </div>

                        <div class="titre">

                             <h3><?php echo $donnees['titre'];?> </h3>

                        </div>

                        <div class="content">

                           <p><?php echo $donnees['description'];?></p>

                        </div>

                    </div>
                    </a>
                <p id="imagemarge"><a href="evenement.php" class="myButton">voir l'évènement</a></p><p><a href="#" class="myButton">annuler participation</a></p>
                <?php
                   }
                    $req->closeCursor(); 
                ?>
	</span>
	
        <?php include "pied_de_page.php" ?>
        
        
        <script type=\"text/javascript\" src=\"calendrier.js"></script>
        
    </body>
</html>
