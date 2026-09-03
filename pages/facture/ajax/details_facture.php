<?php

include('../../connexion.php');

if(isset($_POST['id_facture']))
{
    $id_facture = $_POST['id_facture'];


    //ENTETE FACTURE        
$req = $bdd->prepare('SELECT  * FROM factures f, interventions i, voitures v, clients c WHERE f.id_interv=i.id_interv AND i.id_voiture=v.id_voiture and v.id_client=c.id_client and f.id_facture =:facture');
$req->execute(array('facture'=>$id_facture));

$lignes = $req->fetch();
$numero_facture = $lignes['numero_facture'];
$nom_client = $lignes['nom_client'];
$date_facture = $lignes['date_facture'];
$main_oeuvre = $lignes['mmo'];
$marque =  $lignes['marque_voiture'];
$modele =  $lignes['modele_voiture'];
$plaque =  $lignes['numero_plaque'];
$objet =   $lignes['libelle_intervention'];
                
   //FIN ENTETE FACTURE
   
    $entete = ' <div id="print">
                <div style="border:1px; width: 180px; height:200px;margin-top:25px">
                     <img src="ajax/lg.png" alt="aaaa" style="width:175px; height:170px">
                </div>
                   <div style="margin-top:-200px"><div style="line-height:1em;margin-left:206px">
                    <span><center><b>Garage La Révélation</b></center></span>
                    <span><center>Tous Travaux de Mécanique Auto</center></span>
                    <span><center>New Technologie</center></span>
                    <span><center>Sis à Agbavi non loin du grand carrefour</center></span>
                    <span><center>Tel : 92 16 29 28 / 99 06 59 58</center></span>
                    <span><center>LOME - TOGO</center></span></div>
    '; 

    $fact  = '<br><br><div style="margin-top:50px; float:right">Facture N° :  <b>'.$numero_facture.'</b><br> Client : <b>'.$nom_client.'</b><br>Date Intervention : <b>'.$lignes['date_fin'].'</b></div><br>';

    $voiture = '<br><div>Marque<b> : '.$marque.'</b><br>Modele<b> : '.$modele.'</b><br>Plaque<b> : '.$plaque.'</b><br><u>Objet de l\'intervention</u>: '.$objet.'</div>Date Facture : '.$date_facture.'';

    $entete_tableau = '<br><center><table class="table table-striped">
            <thead>
            <tr>
            <th colspan="4"> <u>Les détails de l\'intervention </u></th>
            </tr>
                <tr>
                    <th style="text-align:left">Pièce</th>
                    <th width:50>Quantite</th>
                    <th>Prix unitaire</th>
                    <th>Prix Total</th>
                </tr>
            </thead><tbody>';

       //AFFICHER LE CORPS DU TABLEAU ET SES INFORMATIONS
       
       $req = $bdd->prepare('SELECT * FROM interventions_pieces ip, pieces p, interventions i,factures f WHERE ip.id_piece=p.id_piece and ip.id_interv=i.id_interv and f.id_interv=i.id_interv and f.id_facture=:id');
       $req->execute(array('id'=>$id_facture));
    
    $t1 = $entete.$fact.$voiture.$entete_tableau;
    $i = 0;
    $tot = 0;
    while($dnn = $req->fetch()){
        $i++;
        $libelle = $dnn['libelle_piece'];
        
        $nb = $dnn['nb_piece'];
        $prix = $dnn['prix_piece'];
        $total_ligne = $nb*$prix;
        $tot = $tot+$total_ligne;
        $t1 .= '
        <tr>
       
         <td height="10" style="border:1px solid black; border-raduis:6px">'.utf8_encode($dnn['libelle_piece']).'</td>
         <td style="border:1px solid black; border-raduis:6px"><center>'.$dnn['nb_piece'].'</center></td>
         <td style="border:1px solid black; border-raduis:6px"><center>'.$dnn['prix_piece'].'</center></td>
         <td style="border:1px solid black; border-raduis:6px"><center>'.$total_ligne.'</center></td></tr>
         <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
        ';
           
    }
    $sm = intval($tot+$main_oeuvre);

    $t1 .='<tr><td></td><td></td><td></td><td></td><td></td></tr>
    <tr>
    <td><center><b>Total</b></td><td></td><td></td><td style="border:1px solid black; border-raduis:6px"><b>'.strrev(wordwrap(strrev($tot), 3, ' ', true)).' F CFA</b></center></td>
    </tr>
    <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <tr>
    <td><center><b>Main d\'oeuvre : </b></td><td></td><td></td><td style="border:1px solid black; border-raduis:6px"><b>'.strrev(wordwrap(strrev($main_oeuvre), 3, ' ', true)).' F CFA</b></center></td>
    </tr><br>
    <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <tr>
    <td><center><b>TOTAL FACTURE : </b></td><td></td><td></td><td style="border:1px solid black; border-raduis:6px"><b>'.strrev(wordwrap(strrev($sm), 3, ' ', true)).' F CFA</b></center></td>
    </tr>
    
    </tbody></table></br><i>NOUS VOUS REMERCIONS POUR LA CONFIANCE.</i></center></div></div></div></div></br>';
    echo $t1;
}

?>
