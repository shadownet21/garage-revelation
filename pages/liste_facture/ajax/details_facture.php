<?php 
include('../../../connexion.php');
if(isset($_POST['id_facture']))

{
    $id_facture = $_POST['id_facture'];

    $req = $bdd->prepare("SELECT * FROM factures WHERE  id_facture=:id");
    $req->execute(array('id'=>$id_facture)); 
    $dnn = $req->fetch();
    $id_interv = $dnn['id_interv'];


    $requ = $bdd->prepare("SELECT * FROM interventions i, interventions_pieces ip WHERE    i.id_interv=ip.id_interv AND i.id_interv=:id");
    $requ->execute(array('id'=>$id_interv)); 
    $dnn = $requ->fetch();
    $nb_lignes = $requ->rowCount();
    if($nb_lignes==0){ //L'INTERVENTION N'A PAS NECESSITE DE CHANGEMENT DE PIECES
      $requ = $bdd->prepare('SELECT * FROM interventions  WHERE id_interv=:id');
      $requ->execute(array('id'=>$id_interv)); 
      $dnn = $requ->fetch();
      $mainoeuvre = $dnn['mmo'];
      $contenu='';
      $entete =' <table><caption>'.$dnn['libelle_intervention'].'</caption>
      <thead>
      <tr style="background-color:#8FBC8F">
        <th><center>#</center></th>
        <th style="width:500px"><center>Pièces</center></th>
        <th style="width:250px"><center>Quantité</center></th>
        <th style="width:250px"><center>Prix unitaire</center></th>
        <th style="width:250px"><center>Prix vente</center></th>
      </tr>
      </thead><tbody>
      <tr style="background-color:#80BDE3">
      <td><center>-</center></td>
      <td style="width:500px"><center>-</center></td>
      <td style="width:250px"><center>-</center></td>
      <td width:250px><center>- </center></td>
      <td width:250px><center>-</center></td>
      </tr>
      <tr style="background-color:#8FBC8F">
       <td style="width:250px"><center><b>Main d\'oeuvre : </b></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td style="color:red"><center><b>'.strrev(wordwrap(strrev($mainoeuvre), 3, ' ', true)).'&nbsp; FCFA</b></center></td>
       </tr>
      </tbody>';
      echo $entete.$contenu;
    }elseif($nb_lignes>0){
     
      $requette = $bdd->prepare("SELECT * FROM interventions i, interventions_pieces ip,pieces p WHERE i.id_interv=ip.id_interv AND ip.id_piece=p.id_piece AND  i.id_interv=:id");
      $requette->execute(array('id'=>$id_interv)); 


      $total = 0;
      $all = 0;
      $i=0;
      $contenu='';
      $foot = '';
      $entete =' <table>
      <thead>
      <tr style="background-color:#8FBC8F">
        <th><center>#</center></th>
        <th style="width:500px"><center>Pièces</center></th>
        <th style="width:250px"><center>Quantité</center></th>
        <th style="width:250px"><center>Prix unitaire</center></th>
        <th style="width:250px"><center>Prix vente</center></th>
      </tr>
      </thead>
      
       
       </tr>';
         //RECUPERER LE TOTAL 
      $requ = $bdd->prepare('SELECT SUM(prix_t_piece) as stotal  FROM interventions_pieces  WHERE id_interv=:id');
      $requ->execute(array('id'=>$id_interv)); 
      $dnn = $requ->fetch();
      $sous_total = $dnn['stotal'];
      //
       
      while( $res = $requette->fetch()) {
      
        $i++;  
        $total = intval($res['nb_piece']*$res['prix_piece']);
        $mainoeuvre = $res['mmo'];
        
        
        $contenu.='
        <tr style="background-color:#80BDE3">
        <td><center>'. $i .'</center></td>
        <td style="width:500px"><center>'. mb_convert_encoding($res['libelle_piece'], 'UTF-8') .'</center></td>
        <td style="width:250px"><center>'. $res['nb_piece'].'</center></td>
        <td width:250px><center>'. $res['prix_piece'].' </center></td>
        <td width:250px><center>'. $total.'</center></td></tr>
        ';
        
        $all = $all+$total;
       }
       
       $foot .= '  
       <tr style="background-color:#8FBC8F">
       <td style="width:250px"><center><b>Sous Total : </b></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td style="color:red"><center><b>'.strrev(wordwrap(strrev($sous_total), 3, ' ', true)).'&nbsp; FCFA</b></center></td>
       </tr>

       <tr style="background-color:#8FBC8F">
       <td style="width:250px"><center><b>Main d\'oeuvre : </b></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td style="color:red"><center><b>'.strrev(wordwrap(strrev($mainoeuvre), 3, ' ', true)).'&nbsp; FCFA</b></center></td>
       </tr>
       <tr style="background-color:#8FBC8F">
       <td style="width:250px"><center><b>TOTAL : </b></center></td>
       <td><center></center></td>
       <td><center></center></td>
       <td><center></center></td>
   
       <td style="color:red"><center><b>'.strrev(wordwrap(strrev($sous_total+$mainoeuvre), 3, ' ', true)).'&nbsp; FCFA</b></center></td>
       </tr>';
      
      echo $entete.$contenu.$foot;
    }
    
  
     
    } 
  
        

    
  ?>


