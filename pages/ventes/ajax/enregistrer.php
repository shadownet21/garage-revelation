<?php 
include('../../connexion.php');
if(isset($_POST['id_voiture']) and isset($_POST['id_piece']) and isset($_POST['nbre_piece_av']) and isset($_POST['prix_unitaire']) and isset($_POST['nom_acheteur']) )

{
            $id_voiture = $_POST['id_voiture'];
            $id_piece = $_POST['id_piece'];
            $qtte_av = $_POST['nbre_piece_av'];
            $prix_vente = $_POST['prix_unitaire'];
            $date = date('Y-m-d H:i:s');
            $nom_acheteur =  $_POST['nom_acheteur'];

            
  if(empty($id_voiture) || empty($id_piece) || empty($qtte_av) || empty($prix_vente) || empty($nom_acheteur) ){ echo 0; }
  else{
    //VERIFICATION DE L'APPARTENANCE DE LA PIECE AU VEHICULE
    $req = $bdd->prepare('SELECT * FROM voitures_pieces WHERE  id_voiture=:id_voiture and id_piece=:id_piece  ');
    $req->execute(array(
      'id_piece'=>$id_piece,
      'id_voiture'=>$id_voiture )); 
        $res = $req->fetch();
          $lignes = $req->rowCount();
              if($lignes<1){  echo 400; } /* LA PIECE N'EXISTE PAS POUR LE VEHICULE SELECTIONNE */
                  else if($lignes > 0)
            {
                    //LA PIECE APPARTIENT AU VEHICULE 
                    $id_voiture_piece=$res['id'];
                        $qtte_stock = $res['qtte_stock'];
                        if($qtte_stock<$qtte_av)
                        {
                          echo 401; //MAIS LES QUANTITES A VENDRE SONT SUPERIEURES A LA QUANTITE EXISTANTE
                        }
                        else
                 {
                        
                        //INSERT INTO VENTE 
                        $req = $bdd->query('SELECT COUNT(id_vente) AS nbre FROM vente');
                        $req->execute();
                        $res = $req->fetch();
                        $nbre = $res['nbre'];
                        if($nbre==0)
                            {
                              //TABLE VIDE
                              $code_initial = date('Y').'11';
                              $req = $bdd->prepare('INSERT INTO vente(code_vente,date_vente,id_type_vente,nom_acheteur) VALUES(:a,:b,:c,:d)');
                              $req->execute(array(
                                'a'=>$code_initial,
                                'b'=>$date,
                                'c'=>1,
                                'd'=>$nom_acheteur
                                ));   
                                $req = $bdd->prepare('SELECT * FROM vente ORDER BY id_vente DESC LIMIT 1');
                              $req->execute();
                              $res = $req->fetch();
                              $id_vente = $res['id_vente'];
                              
                                        //INSERT INTO VENTE_PIECES
                                      $req = $bdd->prepare('INSERT INTO ventes_pieces(id_voiture,id_piece,id_vente,qtte_vendue,prix_unitaire) VALUES(:a,:b,:c,:d,:e)');
                                      $req->execute(array(
                                        'a'=>$id_voiture,
                                        'b'=>$id_piece,
                                        'c'=>$id_vente,
                                        'd'=>$qtte_av,
                                        'e'=>$prix_vente
                                        ));  
                              }
                         elseif($nbre>=1)
                         {
                          //TABLE NON VIDE
                          $req = $bdd->prepare('SELECT * FROM vente ORDER BY id_vente DESC LIMIT 1');
                              $req->execute();
                              $res = $req->fetch();
                              $code_vente = $res['code_vente'];

                          //ENREGISTRER DANS VENTE
                          $req = $bdd->prepare('INSERT INTO vente(code_vente,date_vente,id_type_vente,nom_acheteur) VALUES(:a,:b,:c,:d)');
                          $req->execute(array(
                            'a'=>$code_vente+1,
                            'b'=>$date,
                            'c'=>1,
                            'd'=>$nom_acheteur
                            ));   
                          //RECUPERER L'ID DE LA VENTE
                          $req = $bdd->prepare('SELECT * FROM vente ORDER BY id_vente DESC LIMIT 1');
                          $req->execute();
                          $res = $req->fetch();
                          $id_vente = $res['id_vente'];
                              
                                        //INSERT INTO VENTE_PIECES
                                      $req = $bdd->prepare('INSERT INTO ventes_pieces(id_voiture,id_piece,id_vente,qtte_vendue,prix_unitaire) VALUES(:a,:b,:c,:d,:e)');
                                      $req->execute(array(
                                        'a'=>$id_voiture,
                                        'b'=>$id_piece,
                                        'c'=>$id_vente,
                                        'd'=>$qtte_av,
                                        'e'=>$prix_vente
                                        ));

                                        $qtte_restante = $qtte_stock-$qtte_av;
                                        $fin = $bdd->prepare('UPDATE voitures_pieces SET qtte_stock=:qtte_restante WHERE id_piece=:pie and id_voiture=:voi');
                                        $fin->execute(array(
                                          'qtte_restante'=>$qtte_restante,
                                          'pie'=>$id_piece,
                                          'voi'=>$id_voiture
                                          
                                        ));
                          }
                echo 402;
             }

            }
      }
    }     
  ?>


