<?php 
include('../connexion.php');
if(isset($_POST['username']) and isset($_POST['password'])  )

{
            $username = $_POST['username'];
            $password = $_POST['password'];
           
                       
            
  if(empty($username) || empty($password) ){ echo 0; }
  else{
    //VERIFICATION 
    $req = $bdd->prepare('SELECT * FROM users WHERE username=:user and password=:pass ');
    $req->execute(array(
        'user'=>$username,
        'pass'=>$password
      

    )); 
        $res = $req->fetch();
        $nb_ligne =$req->rowCount();
          if($nb_ligne>0){
                //AUTHENTIFICATION APPROUVEE 
                echo 1;                   

            }else if($nb_ligne<1){
            
           
             echo 2; 
              
          }
        }
        }
         
  ?>


