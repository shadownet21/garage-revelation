<?php
session_start();
ob_start();
include('connexion.php');

 $email = $_SESSION['flash_email'];
 $id = $_SESSION['id'];


$verif = $bdd->prepare('SELECT * FROM cr_users WHERE user_id=:id');
$verif->execute(array('id'=>$id));

$nb_lignes = $verif->rowCount();


if($nb_lignes>0){

	$donnees = $verif->fetch();
	$id = $donnees['user_id'];
	$date = date('Y-m-d H:i:s');
//MIS A JOUR DU STATUT DE CONNEXION 
	$inactif = 0;
    $req_statut_conn = $bdd->prepare('UPDATE cr_users set statut_connexion=:inactif where user_id=:user_id');
    $req_statut_conn->execute(array(
    	'inactif'=>$inactif,
      	'user_id'=>$id
      ));

    $req_update_hist = $bdd->prepare('UPDATE historique_connexions SET date_heure_deconn=:datehd WHERE user_id=:u_id');
    $req_update_hist->execute(array(
    		'u_id'=>$id,
    		'datehd'=>$date

    ));
    
header('location:index.php');
unset($_SESSION['flash_email']);

ob_end_flush();

session_destroy();



}


?>
