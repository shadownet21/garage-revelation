<?php 
include('../../../connexion.php');
if(isset($_POST['date_start']) and isset($_POST['date_end']))

{
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];

            
  if(empty($date_start) || empty($date_end)){ echo 0; }

  if($date_start>$date_end){echo 111; die();}


  if(!empty($date_start) and !empty($date_end) and $date_start<$date_end or $date_start=$date_end ){

    
    $req = $bdd->prepare("SELECT * FROM factures f, interventions i, voitures v, clients c WHERE  date(f.date_facture) BETWEEN :starter AND  :ender AND f.id_interv=i.id_interv AND i.id_voiture=v.id_voiture AND v.id_client=c.id_client ORDER BY f.date_facture DESC");
    $req->execute(array('starter'=>$date_start,'ender'=>$date_end)); 

    $nb_lignes = $req->rowCount();

      if($nb_lignes<1){echo 1;}

    else if($nb_lignes>0){

      $contenu="";
                      $i=0;
                      $total = 0;
      while( $res = $req->fetch()) {
        $total = $total+$res['montant_facture'];
       $i++;  
  
       $contenu.='
       <tr>
       <td><center>'. $i .'</center></td>
       <td><center>'. $res['numero_facture'].'</center></td>
       <td><center>'. $res['libelle_intervention'] .'</center></td>
       <td><center>'. $res['numero_plaque'].'-'.$res['marque_voiture'].'</center></td>
       <td><center>'. $res['nom_client'].' </center></td>
       <td><center>'. $res['montant_facture'].'</center></td>
       <td><center>'. $res['date_facture'].'</center></td>
       <td><center><button class="btn btn-info btn-md" data-target="#fact_detail" data-toggle="modal" onClick="details_facture('.$res['id_facture'].')"><i class="fa fa-info"></i></button></center></td>
       </tr>';

      }
      $contenu.='
      <tr>
      <td><center><b>TOTAL</b></center></td>
      <td><center></center></td>
      <td><center></center></td>
      <td><center></center></td>
      
      <td><center> </center></td>
      <td style="color:red"><center><b>'.number_format($total, -1, 3, ' ').'&nbsp; FCFA</b></center></td>
      </tr>';
      
      echo $contenu;
    } 
  
        
}
}     
  ?>


