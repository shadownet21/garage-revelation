<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">VENTE DE PIECES DETACHEES CASSE</h1>
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
      <!-- MODAL MODIFICATION DU NOMBRE DE PIECES DU MOTEUR -->
      
      <div class="modal fade" id="mpm">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier le nombre de pièces repertoriées du moteur </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div id="formulaire_liste_pieces_moteur_toedit"></div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-success" id="edit_piece_moteur">Modifier</button>
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
             Vente | Pièces détachées | Moteur et accessoires 
            </h3>
          </div>
          <div class="card-body">
            <h4>MENUS</h4>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="enregistrer_vente_tab" data-toggle="pill" href="#enregistrer_vente" role="tab" aria-controls="enregistrer_vente" aria-selected="true"><b>Enregistrer une vente</b> </a>
                </div>
              </div>
              <div class="col-7 col-lg-8">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="enregistrer_vente" role="tabpanel" aria-labelledby="enregistrer_vente_tab">
                    <!-- ENREGISTRER VENTE -->
                    
                    <div class="col-lg-8">         
                    <?php echo _("Voiture"); ?>
                                                <select class="form-control" id="id_voiture">
                                                       <option> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                            $req_list = $bdd->query('SELECT * FROM  voitures');
                                                             $req_list->execute();    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $car =  $dnn['id_voiture'];
                                                          echo' <option value='.$dnn['id_voiture'].'>'.utf8_encode($dnn['marque_voiture']).'-'.utf8_encode($dnn['modele_voiture']).'&nbsp;&nbsp;Chassis N°&nbsp;&nbsp;'.utf8_encode($dnn['numero_chassis']).'</option> ';
                                                                 
                                                               }  
                                                      ?>
                                                  </select>

                                                 <?php echo _("Pièce"); ?>
                                                <select class="form-control" id="id_piece">
                                                       <option> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                              $req = $bdd->query('SELECT * FROM pieces');
                                                              $req->execute();    
                                                             
                                                          while($dnn = $req->fetch())
                                                               {
                                                          echo' <option value='.$dnn['id_piece'].'>'.utf8_decode($dnn['libelle_piece']).'</option> ';
                                                                 
                                                               }   
                                                      ?>
                                                  </select>
                                                  <?php echo _("Quantite à vendre"); ?>
                                                  <input type="number" class="form-control" id="nbre_piece_av" placeholder="Entrez le nombre">
                                                  <?php echo _("Prix unitaire"); ?>
                                                  <input type="number" class="form-control" id="prix_unitaire" placeholder="Entrez le prix">
                                                  <?php echo _("Nom de l'acheteur"); ?>
                                                  <input type="text" class="form-control" id="nom_acheteur" placeholder="Entrez le nom de l'acheteur">
                                                  <br><center><button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_vente">Enregistrer</button></center></center>
                                                  
                                        </div>
              
                    <!-- ENREGISTRER VENTE -->
                  </div>
                 
                  <div class="tab-pane fade" id="liste_vente" role="tabpanel" aria-labelledby="liste_vente_tab">
                    <div class="row">
                           
                  

                  <?php
                          /* $req = $bdd->query('SELECT vente_pieces');
                          $req->execute(); */
                          
                          //while($resultat = $req->fetch()){
                            
                         
                  ?>
             
                        <?php //}?>
                  
                
                  </div>
                  </div>
                   
                </div>
              </div>
            </div>
           
    
          </div>
          <!-- /.card -->
        </div>
        <!-- TABS ****************************************-->
      
          <div class="card-header">
            <h3 class="card-title">Liste des ventes de pieces détachées</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th><center>Voiture</center></th>
                <th><center>Pièce</center></th>
                <th><center>Quantité vendue</center></th>
                <th><center>Prix unitaire</center></th>
                <th><center>Prix total</center></th>
                <th><center>Acheteur</center></th>
                <th><center>Modifier</center></th>
                
              </tr>
              </thead>
              <tbody>
                <?php
                //AJOUTER UN DISTINCT SUR LE ID VOITURE ET ON AFFICHERA L'ENSEMBLE DES PIECES DETACHEES CONCERNANT CETTE DERNIERE
      $req = $bdd->query('SELECT * FROM ventes_pieces vp , vente ve,pieces p, voitures v WHERE vp.id_vente=ve.id_vente AND vp.id_voiture=v.id_voiture and vp.id_piece=p.id_piece ORDER BY vp.id DESC '); 
      $req->execute();
      
      $i=0; 
      while($dnn=$req->fetch()) {           
                               $i++; 
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><center><?php echo $dnn['marque_voiture'].'&nbsp;&nbsp;'.$dnn['modele_voiture']; ?></center></td>
              <td><center><?php echo utf8_decode($dnn['libelle_piece']); ?></center></td>
              <td><center><?php echo $dnn['qtte_vendue']; ?></center></td>
              <td><center><?php echo $dnn['prix_unitaire'];?></center></td>
              <td><center><?php echo $dnn['prix_unitaire']*$dnn['qtte_vendue'];?></center></td>
              <td><center><?php echo $dnn['nom_acheteur'];?></center></td>
              
              <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-edit"></i></button> </center> </td>
                
              </tr>
              <?php }?>
                           </tbody>
             
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
