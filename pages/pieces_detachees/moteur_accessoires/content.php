<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">MOTEUR ET ACCESSOIRES</h1>
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
             Pièces détachées | Moteur et accessoires
            </h3>
          </div>
          <div class="card-body">
            <h4>MENUS</h4>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="enregistrer_piece_tab" data-toggle="pill" href="#enregistrer_piece" role="tab" aria-controls="enregistrer_piece" aria-selected="true">Enregistrer les pièces</a>
                  <a class="nav-link" id="lier_pieces_vehicule_tab" data-toggle="pill" href="#lier_pieces_vehicule" role="tab" aria-controls="lier_pieces_vehicule" aria-selected="false">Lier les pièces à la voiture</a>
                  <a class="nav-link" id="liste_pieces_vehicule_tab" data-toggle="pill" href="#liste_pieces_vehicule" role="tab" aria-controls="liste_pieces_vehicule" aria-selected="false">Liste des associations V-P</a>
                  
                </div>
              </div>
              <div class="col-7 col-lg-8">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="enregistrer_piece" role="tabpanel" aria-labelledby="enregistrer_piece_tab">
                    <!-- ENREGISTRER PIECES -->
                    <form>
                <label for="exampleInputEmail1">Nom de la pièce</label>
                <input type="text" class="form-control" id="nom_piece_moteur" placeholder="Entrer le nom de la pièce">
              <center><br>
              <button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_piece">Enregistrer</button></center>
          </form>
                    <!-- ENREGISTRER PIECES -->
                  </div>
                  <div class="tab-pane fade" id="lier_pieces_vehicule" role="tabpanel" aria-labelledby="lier_pieces_vehicule_tab">
                  <div class="col-lg-8">         
                                                 <?php echo _("Voiture"); ?>
                                                <select class="form-control" id="id_voiture">
                                                       <option> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                          $req_list = $bdd->query('SELECT * FROM voitures');
                                                               while($dnn = $req_list->fetch())
                                                               {
                                                                  echo' <option value='.$dnn['id_voiture'].'>'.utf8_encode($dnn['marque_voiture']).'-'.utf8_encode($dnn['modele_voiture']).'</option>
                                                                  ';
                                                               }
                                                      ?>
                                                  </select>
                                                  <?php echo _("Pièce retrouvée"); ?>
                                                <select class="form-control" id="id_piece">
                                                       <option> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                          $req_list = $bdd->query('SELECT * FROM pieces WHERE id_categorie=1');
                                                               while($dnn = $req_list->fetch())
                                                               {
                                                                  echo' <option value='.$dnn['id_piece'].'>'.utf8_decode($dnn['libelle_piece']).'</option>
                                                                  ';
                                                               }
                                                      ?>
                                                  </select>
                                                  <?php echo _("Nbre de pièces retrouvé"); ?>
                                                  <input type="number" class="form-control" id="nbre_piece"><br>
                                                  <button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_piece_moteur">Enregistrer</button></center>
                                        </div>
                  </div>
                  <div class="tab-pane fade" id="liste_pieces_vehicule" role="tabpanel" aria-labelledby="liste_pieces_vehicule_tab">
                    <div class="row">
                           
                  

                  <?php
                          $req = $bdd->query('SELECT DISTINCT (VP.id_voiture),VP.id_piece,VP.qtte_stock,VP.date_enreg,V.marque_voiture,V.modele_voiture,VP.qtte_stock,P.libelle_piece,V.code_voiture,P.id_categorie
                          FROM voitures_pieces VP INNER JOIN voitures V ON VP.id_voiture=V.id_voiture INNER JOIN pieces P ON  VP.id_piece=P.id_piece INNER JOIN categories C ON P.id_categorie=C.id_categorie AND P.id_categorie=1');
                          $req->execute();
                          
                          while($resultat = $req->fetch()){
                            $code_voiture = $resultat['code_voiture'];
                            $marque = $resultat['marque_voiture'];
                            $modele = $resultat['modele_voiture'];
                            $piece = $resultat['libelle_piece'];
                            $qtte_trouve = $resultat['qtte_stock'];
                            $id_piece = $resultat['id_piece'];
                            $id_voiture = $resultat['id_voiture'];
                         
                  ?>
                  <!-- AFFICHAGE DES BOXES -->
                 <div class="mb-3">
                        <div class="small-box bg-olive color-palette">
                              <div class="inner">
                              <h3><sup style="font-size: 20px"><?php echo $code_voiture.' '.$marque.' '.$modele; ?></sup></h3>
                              <p><b><?php echo utf8_decode($piece).' : '.$qtte_trouve; ?></b></p>
                            </div>
                                  <div class="icon">
                                <i class="fa fa-car-side" style="width:fit-content"></i> 
                                  </div>
                                  <p id="id_id_piece" style="display: none;"><?php echo $id_piece; ?></p> <p id="id_id_voiture" style="display: none;"><?php echo $id_voiture; ?></p><p id="id_qtte_trouve" style="display: none;"><?php echo $qtte_trouve; ?></p>
                                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#edit_nbre_piece" onclick="test(<?php echo $id_piece; ?>,<?php echo $id_voiture; ?>,<?php echo $qtte_trouve; ?>)">
                                          Modifier le nombre <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                        </div>
                  </div>
                        <?php echo "&nbsp;&nbsp;&nbsp;";}?>
                  
                
                  </div>
                  </div>
                   
                </div>
              </div>
            </div>
           
    
          </div>
          <!-- /.card -->
        </div>
        <!-- TABS ****************************************-->
        <div class="card card-info">
          
          <div class="card-header">
            <h3 class="card-title">Liste des pieces de moteur</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th><center>Code piece</center></th>
                <th><center>Nom pièce</center></th>
                <th><center>Modifier</center></th>
               
                
                
              </tr>
              </thead>
              <tbody>
                <?php
                //AJOUTER UN DISTINCT SUR LE ID VOITURE ET ON AFFICHERA L'ENSEMBLE DES PIECES DETACHEES CONCERNANT CETTE DERNIERE
      $req = $bdd->prepare('SELECT * FROM pieces WHERE id_categorie =1 ORDER BY code_piece DESC '); 
      $req->execute();
      $i=0;
      while($dnn=$req->fetch()) {           
                               $i++;   
                               $id_piece = $dnn['id_piece'];
                               $libelle = $dnn['libelle_piece'];
                                
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><center><?php echo $dnn['code_piece']; ?></center></td>
              <td><center><?php echo utf8_decode($dnn['libelle_piece']); ?></center></td>
              
              <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" onclick="affiche_piece(<?php echo $id_piece;?>)"><i class="fas fa-edit"></i></button> </center> </td>
                
              </tr>
              <?php }?>
             
              </tbody>
             
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
