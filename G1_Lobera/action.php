<?php 

if($_POST['requete']==1)
{
	include "page 2.php";
}

elseif ($_POST['requete']==2)
{
	
	include "page 1.php";
	
}

elseif ($_POST['requete']==3)
{
	
	include "page 3.php";
	
}
 
 else
 {
	 
	header('Location: nouveau document texte.php');
	 
 }
 ?>