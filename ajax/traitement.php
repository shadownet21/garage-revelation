<?php
include('../connexion.php');

if(isset($_POST['username']) AND isset($_POST['password']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password))
    {
        echo 2; 
    }

    if(!empty($username) and !empty($password))
    {
    $req = $bdd->prepare('SELECT * FROM users WHERE username=:u AND password=:p');
    $req->execute(array(
    'u'=>$username,
    'p'=>$password ));

    $nb_lignes = $req->rowCount();

    if($nb_lignes<1){
        echo 0;

    }else if($nb_lignes>0){

        echo 1;

    }
    
}


}

?>