<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ENREGISTREMENT DES VOITURES</h1>
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
      <!-- MODAL MODIFIER -->
      
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modification ou mise à jour d'information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" id="formulaire_edition_voiture">
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary" swalDefaultSuccess id="bouton_modifier_voiture">Enregistrer les modifications</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- Horizontal Form -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Ajouter une voiture</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">N° Plaque</label>
                <input type="email" class="form-control" id="plaque" placeholder="Entrer le numero de la plaque">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Marque</label>
                <input type="email" class="form-control" id="marque" placeholder="Entrer la marque">
              </div>
              <div class="form-group" id="success">
                <label for="exampleInputEmail1">Modèle</label>
                <input type="email" class="form-control" id="modele" placeholder="Entrer le modèle">
              </div>
              <div class="form-group">
              <?php echo _("<label>Type de voiture</label>"); ?>
                                                <select class="form-control" id="type_voiture">
                                                       <option> <?php echo _("--Choisir-- "); ?></option>
                                                       <option value="Personnelle"> <?php echo _("PERSONNELLE"); ?></option>
                                                       <option value="Taxi"> <?php echo _("TAXI"); ?></option>
                                                      
                                                  </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Numéro chassis</label>
                <input type="email" class="form-control" id="numero_chassis" placeholder="Entrer le numéro de chassis">
              </div>
              <?php echo _("<label>Client</label>"); ?>
                                                <select class="form-control" id="id_client">
                                                       <option> <?php echo _("--Choisir-- "); ?></option>
                                                      <?php
                                                            $req_list = $bdd->query('SELECT * FROM  clients ORDER BY id_client DESC');
                                                             $req_list->execute();    
                                                            // $dnn = $req_list->fetch();
                                                          while($dnn = $req_list->fetch())
                                                               {
                                                               $clt =  $dnn['id_client'];
                                                          echo' <option value='.$dnn['id_client'].'>'.utf8_encode($dnn['nom_client']).'</option> ';
                                                                 
                                                               }  
                                                      ?>
                                                  </select><br>
             <!--  <div class="form-group">
                <label>Date enregistrement:</label>
                  <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                      <input type="text"  id="date_enreg" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                      <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
             
            </div> -->
            <!-- /.card-body -->
              <center>
              <button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_voiture">Enregsitrer</button></center>
          
          </form>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Liste des voitures du garage</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Code</th>
                <th>Client</th>
                <th>N°Plaque</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Numero chassis</th>
                <th>Date enregistrement</th>
                <th><center>Modifier</center> </th>
                <th><center>Supprimer</center> </th>
              </tr>
              </thead>
              <tbody>
                <?php
                                          
                                          $req = $bdd->prepare('SELECT * FROM voitures V, clients C WHERE V.id_client=C.id_client  ORDER BY V.id_voiture DESC');
                                          $req->execute();
                                          $i = 0;
                                          while($res = $req->fetch()){
                                              $i++;
                                              $id = $res['id_voiture'];
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><center><?php echo $res['code_voiture']; ?></center></td>
              <td><center><?php echo $res['nom_client']; ?></center></td>
              <td><center><?php echo $res['numero_plaque']; ?></center></td>
              <td><center><?php echo $res['marque_voiture']; ?></center></td>
              <td><center><?php echo $res['modele_voiture']; ?></center></td>
              <td><center><?php if(empty($res['numero_chassis'])) {echo '<center>-</center>';}else{echo $res['numero_chassis'];}  ?></center></td>
              <td><center><?php echo $res['date_enreg']; ?></center></td>
              
              
                <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" onclick="affiche_modif(<?php echo $id; ?>)"><i class="fas fa-edit"></i></button> </center> </td>
                <td> <center><button class="btn btn-danger" toastsDefaultDanger data-toggle="modal" data-target="#modal-sm" onclick="affiche_del(<?php echo $id; ?>)"> <i class="fas fa-trash"></i> </button></center></td>
                  
               
              </tr>
              <?php }?>
             
              </tbody>
             
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
