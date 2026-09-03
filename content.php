<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">GARAGE REVELATION</h1>
        </div><!-- /.col -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->query('SELECT count(id_voiture) as nbvoiture FROM voitures');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbvoiture'];
                        echo $nblignes;
              
              ?></h3>

              <p>VOITURES</p>
            </div>
            <div class="icon">
              <i class="ion ion-model-s"></i>
            </div>
         <!--    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
       
        
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->query('SELECT count(id_mecano) as nbm FROM mecanos');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbm'];
                        echo $nblignes;
              ?></h3>
              <p>TOUS LES MECANICIENS</p>
            </div>
            <div class="icon">
              <i class="ion ion-gear-a"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-navy">
            <div class="inner">
            <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->query('SELECT count(id_interv) as nbi FROM interventions');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbi'];
                        echo $nblignes;
              ?></h3>
              <p>TOUTES LES INTERVENTIONS</p>
            </div>
            <div class="icon">
              <i class="ion ion-settings"></i>
            </div>
          </div>
        </div><!--  -->
        <!-- ./col ****************************-->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-gray">
            <div class="inner">
            <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->prepare('SELECT count(id_client) as nbc FROM clients WHERE type_client=:typec');
                        $req->execute(array('typec'=>'PHYSIQUE'));
                        $res = $req->fetch();
                        $nblignes = $res['nbc'];
                        echo $nblignes;
              ?></h3>
              <p>CLIENTS PERS. PHYSIQUES</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ********************************* -->
          <!-- ./col ****************************-->
          <div class="col-lg-3 col-6">
          <div class="small-box bg-indigo">
            <div class="inner">
            <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->prepare('SELECT count(id_client) as nbcm FROM clients WHERE type_client=:typec');
                        $req->execute(array('typec'=>'MORALE'));
                        $res = $req->fetch();
                        $nblignes = $res['nbcm'];
                        echo $nblignes;
              ?></h3>
              <p>CLIENTS PERS. MORALES</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ********************************* -->
          <!-- ./col ****************************-->
          <div class="col-lg-3 col-6">
          <div class="small-box bg-lightblue">
            <div class="inner">
            <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->query('SELECT count(id_facture) as nbf FROM factures');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbf'];
                        echo $nblignes;
              ?></h3>
              <p>NOMBRE DE FACTURES EDITES</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
          </div>
        </div>
        <div id="auth_val"></div>
        <!-- ********************************* -->
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