<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">FACTURES</h1>
        </div><!-- /.col -->
        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div> --><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- MODAL SUPPRIMER -->
      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <span>Voulez - vous supprimer cette information ?</span> 
                <span id="suppression_body"></span>
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger" id="bouton_supprimer_voiture">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL CHARGEMENT DU NOMBRE DE PIECES DU MOTEUR -->
      
      <div class="modal fade" id="ajouter_piece">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Enregistrer une pièce </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="col-sm-12">
                    <div class="form-group">
                    <span id="show"></span>
                    </div>
                      <div class="form-group">
                        <label>Nom de la pièce</label>
                        <input type="text" id="nom_piece" class="form-control" placeholder="Entrer le nom de la pièce"> 
                      
                        <label>Prix de la piece</label>
                        <input type="number" id="prix_piece" class="form-control" placeholder="Entrer le prix"> 
                      </div>
            </div>
              
              
           

            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-success" id="bouton_enregistrer_piece">Enregistrer</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL VOIR DETAILS INTERVENTIONS -MECANOS -->
      
      <div class="modal fade" id="details_facture">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Détails de la facture</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div id="formulaire_liste_mecanos_interv"></div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-primary" id="imprimer_facture"><i class="fas fa-print"></i> Imprimer</button>
                         </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- Horizontal Form -->
        <!-- TABS ***************************************-->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
             REVELATION | Facture | Nouvelle facture 
            </h3>
          </div>
          <div class="card-body">
            <h4>MENUS</h4>
            <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="initier_facture_tab" data-toggle="pill" href="#initier_facture" role="tab" aria-controls="initier_facture" aria-selected="true"><b>Initier une facture (1)</b> </a>
                        <a class="nav-link" id="completer_facture_tab" data-toggle="pill" href="#completer_facture" role="tab" aria-controls="completer_facture" aria-selected="true"><b>Pièces changées (2)</b> </a>
                        <a class="nav-link" id="finaliser_facture_tab" data-toggle="pill" href="#finaliser_facture" role="tab" aria-controls="finaliser_facture" aria-selected="true"><b>Finaliser la facture (3)</b> </a>
                        </div>
                      </div>
                       <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                  <!-- 1 INITIER -->      <div class="tab-pane text-left fade show active" id="initier_facture" role="tabpanel" aria-labelledby="initier_facture_tab">
                    <div class="col-lg-8">         
                    <?php echo _("Intervention"); ?>
                                                <select class="form-control" id="id_intervention">
                                                       <option value=""> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                      $cl = "Closed";
                                                         $req_list = $bdd->prepare('SELECT * FROM voitures v, interventions i, clients c where v.id_voiture=i.id_voiture and c.id_client=v.id_client and i.etat<>:etat ORDER BY i.id_interv DESC');
                                                             $req_list->execute(array('etat'=>$cl));    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $id_interv =  $dnn['id_interv'];
                                                          echo' <option value='.$dnn['id_interv'].'>'.$dnn['libelle_intervention'].'&nbsp; du '.utf8_encode($dnn['numero_plaque']).'-'.utf8_encode($dnn['marque_voiture']).'-'.utf8_encode($dnn['modele_voiture']).'&nbsp;de&nbsp;'.utf8_encode($dnn['nom_client']).'</option> ';
                                                               }  
                                                      ?>
                                                  </select>
                                       
                                                  
                                                                           
                                                  <br><center><button type="button" class="btn btn-info btn-lg" id="boutton_initier_facture">Initier la facture</button></center></center>
                                        </div>
                  </div><!-- 1 -->
                  <!-- 2 CPLTER PIECES -->
                  <div class="tab-pane fade" id="completer_facture" role="tabpanel" aria-labelledby="completer_facture_tab">
                  <div class="col-lg-8">    
                    
                                            
                    <?php echo _("Intervention"); ?>
                                                <select class="form-control" id="id_intervention_p">
                                                       <option value=""> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                         $req_list = $bdd->query("SELECT * FROM voitures v, interventions i, clients c where v.id_voiture=i.id_voiture and c.id_client=v.id_client AND i.etat='Encours' ORDER BY i.id_interv DESC");
                                                             $req_list->execute();    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $id_interv =  $dnn['id_interv'];
                                                               echo' <option value='.$dnn['id_interv'].'>'.$dnn['libelle_intervention'].'&nbsp; du '.utf8_encode($dnn['numero_plaque']).'-'.utf8_encode($dnn['marque_voiture']).'-'.utf8_encode($dnn['modele_voiture']).'&nbsp;de&nbsp;'.utf8_encode($dnn['nom_client']).'</option> ';
                                                               }  
                                                      ?>
                                                  </select>
              <?php echo _("Pièces changées"); ?>
              <div class="form-inline">
            <select class="form-control col-lg-8" id="id_piece">
                    <option value=""> <?php echo _("--Choisir-- "); ?></option>
                  <?php
                      $req_list = $bdd->query('SELECT * FROM pieces ORDER BY libelle_piece ASC');
                          $req_list->execute();    
                        // $dnn = $req_list->fetch();
                      while($dnn = $req_list->fetch())
                            {
                            $id_interv =  $dnn['id_piece'];
                      echo' <option value='.$dnn['id_piece'].'>'.utf8_encode($dnn['libelle_piece']).' - '.utf8_encode($dnn['prix_piece']).'F</option> ';
                            }  
                  ?>
              </select> &nbsp;&nbsp;&nbsp;
              <a class="btn btn-sm bg-success" data-toggle="modal" data-target="#ajouter_piece">
                       <i class="fas fa-plus"></i><i class="fas fa-wrench"></i> Ajouter
                </a>   </div>                             
                                           <span>Nombre</span>
                                            <input type="number" class="form-control" id="nb_piece">                 
                                       
                                           
                   <br><center><button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_piece_intervention">Enregistrer Pièce</button></center></center>
                                        </div>
                  </div>
                  <!-- 2 -->

                  <!-- 3 FINALISER-->
                  <div class="tab-pane fade" id="finaliser_facture" role="tabpanel" aria-labelledby="finaliser_facture_tab">
                  <div class="col-lg-8">    
                    
                  <label><?php echo _("Facture"); ?></label>   
                                                <select class="form-control" id="id_facture">
                                                       <option value=""> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                         $req_list = $bdd->query('SELECT * FROM factures f, interventions i, voitures v, clients c WHERE f.id_interv=i.id_interv AND i.id_voiture=v.id_voiture AND f.statut<>"Closed" AND c.id_client=v.id_client ORDER BY f.id_facture DESC');
                                                             $req_list->execute();    
                                                            
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               
                                                          echo' <option value='.$dnn['id_facture'].'>'.'N°'.utf8_encode($dnn['numero_facture']).'||&nbsp;'.utf8_encode($dnn['libelle_intervention']).'&nbsp; de &nbsp;'.utf8_encode($dnn['marque_voiture']).'&nbsp;-&nbsp;'.utf8_encode($dnn['modele_voiture']).'&nbsp;de&nbsp;'.utf8_encode($dnn['nom_client']).'</option> ';
                                                               }  
                                                      ?>
                                                  </select>
                                         
                                            <label>Main d'oeuvre</label>
                                            <input type="number" class="form-control" id="maindoeuvre"> 
                                            <label>Date Facture</label>                
                                            <input type="date" class="form-control" id="date_facture"> 
                                           
                   <br><center><button type="button" class="btn btn-info btn-lg" id="bouton_finaliser_facture">Enregistrer Facture</button></center></center>
                                        </div>
                  </div>
                   <!-- 3 -->
                        </div><!-- FIN TAB -->
                      </div>

              </div> <!-- ROW -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- TABS ****************************************-->
      
          <div class="card-header">
            <h3 class="card-title">Liste des factures</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th><center>Code Facture</center></th>
                <th><center>Intervention</center></th>
                <th><center>Voiture</center></th>
                <th><center>Client</center></th>
                <th><center>Date Facture</center></th>
                <th><center>Etat</center></th>
                <th><center>Détails</center></th>
               
                
              </tr>
              </thead>
              <tbody>
                <?php
                
      $req = $bdd->query('SELECT * FROM interventions I, factures F, voitures V,clients C WHERE  V.id_voiture=I.id_voiture AND F.id_interv=I.id_interv AND V.id_client=C.id_client ORDER BY F.id_facture DESC  '); 
      $req->execute();
      
      $i=0; 
      while($dnn=$req->fetch()) {           
                               $i++;  
                               $id_interv = $dnn['id_interv'];
                               $id_facture =$dnn['id_facture'];
                               $statut = $dnn['statut'];
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><center><?php echo $dnn['numero_facture']; ?></center></td>
              <td><center><?php echo $dnn['libelle_intervention'];?></center></td>
              <td><center><?php echo $dnn['marque_voiture'].' '.$dnn['modele_voiture']; ?></center></td>
              <td><center><?php echo $dnn['nom_client']; ?></center></td>
              <td><center><?php echo $dnn['date_facture']; ?></center></td>
              <td><center><?php if(utf8_encode($statut)=='Closed') {echo '<span class="badge bg-success text-dark">Clôturé</span>';} else {echo '<span class="badge bg-warning text-dark">Encours</span>'; } ?></center></td>
              
             
              
              <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#details_facture" onclick="load_details_facture('<?php echo $id_facture; ?>')"><i class="fas fa-eye"></i></button> </center> </td>
               
              </tr>
              <?php }?>
                           </tbody>
             
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
