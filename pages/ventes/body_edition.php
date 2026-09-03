
<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">MOTEUR ET ACCESSOIRES</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
     
      
     
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Enregistrer les accessoires du moteur</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          
            <div class="card-body">
            <div class="form-group">
            <?php 
                  $id_voiture=$_GET['referencev'];
                
                  $req = $bdd->prepare('SELECT * FROM voitures_pieces vp, pieces p, voitures v WHERE vp.id_voiture=v.id_voiture and vp.id_piece=p.id_piece and vp.id_voiture=:id');
                  $req->execute(array('id'=>$id_voiture));

                  While($dnn = $req->fetch())
                  { 
                    $libelle_piece = $dnn['libelle_piece'];
                    $qtte_stock = $dnn['qtte_stock'];
                    $id_piece = $dnn['id_piece'];
                    ?>
                  <form action="content_edit.php?referencev=' <?php  echo $id_voiture; ?> '" method="post">
                  <label for="exampleInputEmail1">Numero piece</label>
                  <input type="text" class="form-control" name="id_piece_moteur[]" value="<?php echo $id_piece;?>" style="display:none">
                     
                      <label for="exampleInputEmail1">Nom de la pièce</label>
                      <input type="text" class="form-control" name="nom_piece_moteur[]" value="<?php echo $libelle_piece;  ?>">
                      <label for="exampleInputEmail1">Quantite</label>
                      <input type="text" class="form-control" name="qtte[]" value="<?php echo $qtte_stock;  ?>">
                          <?php  } ?>  <br>
                        <center><button type="submit" class="btn btn-info btn-lg" onclick="modif_voiture_piece">Modifier</button></center>  
                        
                  </form>
              </div>
           
             
             
              <?php  
                  $idv = $_GET['referencev'];
              if(isset($_POST['modif']))
              {
                $piece = $_POST['id_piece_moteur'];
                  
                $qtte = $_POST['qtte'];
                 echo count($piece);

              

             /*   for($i = 0; $i < count($piece); $i++) {
                $qty = $qtte[$i];
                $tempPiece = $piece[$i];
                echo 'aa';
                echo 'P'.$tempPiece.'==>QTTE'.$qty.'==>CAR'.$_GET['referencev'].'<br>';
                               
                
               } */
               
              }
                  
              
              
              ?>  
          
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
