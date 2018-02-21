<?php 
session_start();
?>

<!DOCTYPE html>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

$utilisateurid=$_SESSION['id'];
$evenementid=$_GET['event'];
$type=3;


$req = $bdd->prepare('DELETE FROM suis_invite_participe_signale WHERE utilisateur_id_utilisateur=:utilisateurid AND evenement_id_evenement=:evenementid AND type=:type');
$req->execute(array
			(
			'utilisateurid' => $utilisateurid,
			'evenementid' => $evenementid,
			'type' => $type)
			);
			
     
  header('Location: mesevenements.php');      
?>		

