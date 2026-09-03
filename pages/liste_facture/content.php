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
 
      
      <div class="modal fade" id="fact_detail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Détails de la facture </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modal_detail">
           
              <tbody id="affiche_details"> </tbody>
             
            </table>
              
              
           

            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      
              
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
             REVELATION | Facture | Liste facture 
            </h3>
          </div>
          <div class="card-body">
            <h6>Recherche de factures entre deux dates</h6>
            <div class="row">
                   
           
              <div class="col-lg-8">
              <div class="form-group">
                    <label for="">Date Début</label>
                    <input type="date" id="date_start" class="form-control">
                   
              </div>
              <div class="form-group">
                    <label for="">Date Fin</label>
                      <input type="date" id="date_end" class="form-control">
                  </div>

              </div>
              
                 
               <div class="col-lg-8">
           <center>
            <button type="button" class="btn btn-primary btn-lg" id="boutton_rechercher_facture">Rechercher</button>
            </center>
           </div>
         

              </div> <!-- ROW -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- TABS ****************************************-->
      
          <div class="card-header">
            <h3 class="card-title">Liste des factures &nbsp;<b><span id="datedebut" style="color: blue;"></span></b><b>&nbsp;<span id="et">&nbsp;</span></b><b><span id="datefin" style="color: blue;"></span></b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th><center>Code Facture</center></th>
                <th><center>Intervention</center></th>
                <th><center>Voiture</center></th>
                <th><center>Client</center></th>
                <th><center>Montant Facture</center></th>
                <th><center>Date Facture</center></th>
                <th><center>Détails</center></th>
                
              </tr>
              </thead>
              <tbody id="affiche_result"> </tbody>
             
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
