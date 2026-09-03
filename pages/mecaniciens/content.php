<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ENREGISTREMENT DES MECANICIENS</h1>
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
                <span>Voulez - vous supprimer cette information ? Toutes les informations concernant <b> <span id="suppression_body"></span></b> seront supprimées!</span> 
               
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger" id="bouton_supprimer_mecano">Supprimer</button>
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
              <form role="form" id="formulaire_edition_mecano">
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary" swalDefaultSuccess id="bouton_modifier_mecano">Enregistrer les modifications</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- Horizontal Form -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Ajouter un mécanicien</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="nom_mecano" placeholder="Entrer le nom">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Adresse</label>
                <input type="text" class="form-control" id="adresse_mecano" placeholder="Entrer l'adresse">
              </div>
              <div class="form-group" id="success">
                <label for="exampleInputEmail1">Numero de Téléphone</label>
                <input type="number" class="form-control" id="num_tel_mecano" placeholder="Entrer le numero de téléphone">
              </div>
              
             
              <center>
              <button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_mecano">Enregsitrer</button></center>
          
          </form>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Liste des mécaniciens</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nom du mecano</th>
                <th>Numero de téléphone</th>
                <th>Adresse</th>
                <th>Date enregistrement</th>
                <th><center>Modifier</center> </th>
                <th><center>Supprimer</center> </th>
              </tr>
              </thead>
              <tbody>
                <?php
                                          
                                         $req = $bdd->query('SELECT * FROM mecanos ORDER BY id_mecano DESC');
                                          $req->execute();
                                          $i = 0;
                                          while($res = $req->fetch()){
                                              $i++;
                                              $id = $res['id_mecano']; 
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><center><?php echo $res['nom_mecano']; ?></center></td>
              <td><center><?php echo $res['numero_telephone']; ?></center></td>
              <td><center><?php echo $res['adresse_mecano']; ?></center></td>
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
