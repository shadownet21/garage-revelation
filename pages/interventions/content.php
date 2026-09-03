<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">LES INTERVENTIONS</h1>
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
      
      <div class="modal fade" id="edit_nbre_piece">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier le nombre </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="col-sm-6">
          <input class="form-control" type="text" id="a" style="display:none"/>
          <input class="form-control" type="text" id="b" style="display:none"/>
          <input class="form-control" type="text" id="c" style="display:none"/>
         
          
                    <div class="form-group">
                    <span id="show"></span>
                    </div>
                      <div class="form-group">
                        <label>Nouvelle quantité</label>
                        <input type="number" id="qtte_stock_md" class="form-control"> 
                      </div>
            </div>
              
              
           

            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-success" id="bouton_modifier_nb_piece">Modifier</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL VOIR DETAILS INTERVENTIONS -MECANOS -->
      
      <div class="modal fade" id="details_mecano">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Détails sur les mécaniciens </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div id="formulaire_liste_mecanos_interv"></div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                         </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL DELETE INTERVENTION  -->
      <div class="modal fade" id="delete_interv">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <span>Voulez - vous supprimer cette intervention ? Toutes les informations la concernant seront supprimées!</span> 
                <span id="suppression_interv_body"></span>
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger" id="bouton_supprimer_interv">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
        <!-- Horizontal Form -->
        <!-- TABS ***************************************-->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
             REVELATION | Interventions | Enregistrement 
            </h3>
          </div>
          <div class="card-body">
            <h4>MENUS</h4>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="enregistrer_interv_tab" data-toggle="pill" href="#enregistrer_interv" role="tab" aria-controls="enregistrer_interv" aria-selected="true"><b>Enregistrer une intervention</b> </a>
                <a class="nav-link" id="ajouter_meca_interv_tab" data-toggle="pill" href="#ajouter_meca_interv" role="tab" aria-controls="ajouter_meca_interv" aria-selected="true"><b>Ajouter un mécanicien à une intervention</b> </a>
               </div>
              </div>
              <div class="col-7 col-lg-8">
                <div class="tab-content" id="vert-tabs-tabContent">
                 <!-- ENREGISTRER INTERVENTION --> <div class="tab-pane text-left fade show active" id="enregistrer_interv" role="tabpanel" aria-labelledby="enregistrer_interv_tab">
                    <div class="col-lg-8">         
                    <?php echo _("Voiture"); ?>
                                                <select class="form-control" id="id_voiture">
                                                       <option value=""> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                         $req_list = $bdd->query("SELECT * FROM voitures v, clients c WHERE v.id_client=c.id_client  ORDER BY v.marque_voiture ASC");
                                                             $req_list->execute();    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $car =  $dnn['id_voiture'];
                                                          echo' <option value='.$dnn['id_voiture'].'>'.utf8_encode($dnn['libelle_intervention']).' - '.utf8_encode($dnn['marque_voiture']).'-'.utf8_encode($dnn['modele_voiture']).'&nbsp;&nbsp;de &nbsp;'.utf8_encode($dnn['nom_client']).'</option> ';
                                                               }  
                                                      ?>
                                                  </select>
                                                  <span>Objectif de l'intervention</span>
                                                  <input type="text" class="form-control" id="libelle_interv" placeholder="Saisir l'objectif de l'intervention">       
                                                  <span>Date de l'intervention</span>                         
                                                  <input type="date"  id="date_interv" class="form-control">  
                                                  <br><center><button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_intervention">Enregistrer</button></center></center>
                                        </div>
                   
                  </div> 

                  <!-- TAB2 -->
                                   <!-- AJOUTER MECANO INTERVENTION --> <div class="tab-pane text-left fade show" id="ajouter_meca_interv" role="tabpanel" aria-labelledby="ajouter_meca_interv">
                                   <div class="col-lg-8">         
                    <?php echo _("Intervention"); ?>
                                                <select class="form-control" id="id_interv_m">
                                                       <option value=""> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                         $req_list = $bdd->query('SELECT * FROM interventions I, voitures V,clients C WHERE I.id_voiture=V.id_voiture AND V.id_client=C.id_client ORDER BY I.id_interv DESC');
                                                             $req_list->execute();    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $interv =  $dnn['id_interv'];
                                                          echo' <option value='.$dnn['id_interv'].'>'.$dnn['libelle_intervention'].' &nbsp;de&nbsp;'.utf8_encode($dnn['marque_voiture']).' &nbsp;-&nbsp; '.utf8_encode($dnn['modele_voiture']).'&nbsp; de '.utf8_encode($dnn['nom_client']).'</option> ';
                                                               }  
                                                      ?>
                                                  </select>
                                                  <?php echo _("Mécanien"); ?>
                                                <select class="form-control" id="id_mecano_m">
                                                       <option value=""> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                         $req_list = $bdd->query('SELECT * FROM  mecanos');
                                                             $req_list->execute();    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $meca =  $dnn['id_mecano'];
                                                          echo' <option value='.$dnn['id_mecano'].'>'.utf8_encode($dnn['nom_mecano']).'</option> ';
                                                               }  
                                                      ?>
                                                  </select>                                       
                                                  <br><center><button type="button" class="btn btn-info btn-lg" id="boutton_ajouter_mecano_interv">Enregistrer</button></center></center>
                                        </div>
                   
                  </div> 
                  <!--  TAB2-->
                  
                </div>
              </div> <!-- ENREGISTRER INTERVENTION -->

              <!-- TAB2 -->
   
              
              <!-- TAB2 -->
              
            </div>
           
    
          </div>
          <!-- /.card -->
        </div>
        <!-- TABS ****************************************-->
      
          <div class="card-header">
            <h3 class="card-title">Liste des interventions</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th><center>Code Intervention</center></th>
                <th><center>Marque voiture</center></th>
                <th><center>Modele voiture</center></th>
                <th><center>Objectif</center></th>
                <th><center>Client</center></th>
                <th><center>Mécanos intervenants</center></th>
                <th><center>Supprimer</center></th>
               
                
              </tr>
              </thead>
              <tbody>
                <?php
                
      $req = $bdd->query('SELECT * FROM interventions I, voitures V, clients C WHERE I.id_voiture=V.id_voiture AND V.id_client=C.id_client ORDER BY I.id_interv DESC  '); 
      $req->execute();
      
      $i=0; 
      while($dnn=$req->fetch()) {           
                               $i++;  
                               $id_interv = $dnn['id_interv'];
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><center><?php echo $dnn['code_interv']; ?></center></td>
              <td><center><?php echo $dnn['marque_voiture']; ?></center></td>
              <td><center><?php echo utf8_decode($dnn['modele_voiture']); ?></center></td>
              <td><center><?php echo $dnn['libelle_intervention']; ?></center></td>
              <td><center><?php echo $dnn['nom_client']; ?></center></td>
             
              
              <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#details_mecano" onclick="load_mecano_interv('<?php echo $id_interv; ?>')"><i class="fas fa-eye"></i></button> </center> </td>
              <td><center><button class="btn btn-danger" data-toggle="modal" data-target="#delete_interv" onclick="delete_interv('<?php echo $id_interv; ?>')"><i class="fas fa-trash"></i></button> </center> </td>
               
              </tr>
              <?php }?>
                           </tbody>
             
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
