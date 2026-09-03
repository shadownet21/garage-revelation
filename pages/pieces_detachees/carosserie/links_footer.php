
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
<!-- date-range-picker -->
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../../plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="../../../plugins/jquery-validation/jquery.validate.min.js"></script>


<script>
  $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"],
      "oLanguage": {
      "sSearch": "Rechercher"
 }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
     
    });
  });

  $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"],
      "oLanguage": {
      "sSearch": "Rechercher"
 }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
     
    });
  });

    //Date picker
    $('#reservationdatetime').datetimepicker({
      format : 'DD/MM/YYYY HH:mm'
        
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true
     
    });

    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Opération effectuée avec succès.'
       
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
//++++++++++++++++++++++++++++++++++++++++++++++FUNCTIONS++++++++++++++++++++++++++++++++++++++++

//MISE A JOUR DES NOUVELLES DONNEES
    $('#bouton_modifier_voiture').click(function(){

      var id = $('#id_voiture').val();
      var marque = $('#marque').val();
      var modele = $('#modele').val();
      var numero_chassis = $('#numero_chassis').val();
      var date_arr = $('#date_arrivee').val();

      
      $.ajax({
       url:"ajax/traitement_modification.php",
       method:"POST",
      data:{id:id,marque:marque,modele:modele,numero_chassis:numero_chassis,date_arr:date_arr},
       success:function(data){
       // console.log(data);
       const val = data.replace(/[\n\r]+/g, '');
       if(val==1){
        setTimeout(function(){  window.location.reload(); }, 2000);
        Toast.fire({
        icon: 'success',
        title: 'Modification effectuée avec succès.'});
       }
       }
      }); 
   

});


// CHARGEMENT DU FORMULAIRE DE MODIFICATION AVEC LES ANCIENNES DONNEES 
function affiche_del(id){
    
    var id_voiture = id;
            $.ajax({
              url:"ajax/suppression.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              //console.log(data);
              $('#suppression_body').html(data);
            }
            });
            //SUPPRESSION DE L'INFORMATION
            $('#bouton_supprimer_voiture').click(function(){
            //console.log(id_voiture);

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
              });
              
                    $.ajax({
                      url:"ajax/traitement_suppression.php",
                      method:"POST",
                      data:{id_voiture:id_voiture},
                      success:function(data){
                      console.log(data);
                      $('#suppression_body').html(data);
                      setTimeout(function(){  window.location.reload(); }, 2000);
                      }
                      });
                      Toast.fire({
                      icon: 'success',
                      title: 'Suppression effectuée avec succès.'
                      }) 
            });
}

//
$('#boutton_enregistrer_piece').click(function(){
  
var nom_piece_moteur = $('#nom_piece_moteur').val();
     $.ajax({
      url:"ajax/enregistrer_piece.php",
      method:"POST",
      data:{nom_piece_moteur:nom_piece_moteur},
      success:function(data)
  {

    console.log(data);
       const val = data.replace(/[\n\r]+/g, '');
        console.log(val);

      
      if(val==1)
        { 
          Toast.fire({
            icon: 'success',
          title: 'Enregistrement effectué avec succès.'});
          console.log('erreur doublon');
          setTimeout(function(){  window.location.reload(); }, 2000);
       
      }

       if(val==0)
       { Toast.fire({
          icon: 'error',
        title: 'Tous les champs sont obligatoires.'})
       }

        if(val==2)
        { 
            Toast.fire({
            icon: 'error',
          title: 'Cette pièce existe déjà.'});
          console.log('erreur doublon');
      } 
        
  } 
     
      });
}); 

    

//ENREGISTREMENT DANS LA BDD
$('#boutton_enregistrer_piece_moteur').click(function()
{
  var id_voiture = $('#id_voiture').val();
  var id_piece =  $('#id_piece').val();
  var nbre_retrouve =  $('#nbre_piece').val();

  console.log(id_voiture+'=='+nom_piece_moteur+'=='+nbre_retrouve);
 
        $.ajax({
        url:"ajax/enregistrer_piece_voiture.php",
        method:"POST",
        data:{id_voiture:id_voiture,id_piece:id_piece,nbre_retrouve:nbre_retrouve},
        success:function(data){
          const val = data.replace(/[\n\r]+/g, '');
          if(val==1){ Toast.fire({
          icon: 'success',
          title: 'Enregistrement effectué avec succès.'});
          setTimeout(function(){  window.location.reload(); }, 2000);}
          if(val==0){ Toast.fire({
            icon: 'error',
          title: 'Tous les champs sont obligatoires.'})};
          if(val==22){ Toast.fire({
            icon: 'error',
          title: 'Cette pièce a déjà été enregistrée pour cette voiture.'})};
          if(val==33){ Toast.fire({
            icon: 'error',
          title: 'Veuillez entrer un nombre positif.'})};
          
        
        }
      })
      
});
//MODAL QUI AFFICHE LES PIECES RETIREES DU MOTEUR
function affiche_pieces_moteur(id){
  var id_pm = id;
  
  $.ajax({
            url:"ajax/affiche.php",
            method:"POST",
            data:{id_pm:id_pm},
            success:function(data){
            console.log(data);
            $('#formulaire_liste_pieces_moteur').html(data);
           
            }
            });

}

//MODIFICATION DES QUANTITES DES PIECES DETACHEES

function test(p,v,aq)
{
 var piece = p;
 var voiture = v;
 var ancienne_qtte =aq;

 var mesvariables = piece+','+voiture+','+ancienne_qtte;
 var tableau = mesvariables.split(",");
 var pi = tableau[0];
 var vo = tableau[1];
 var aq = tableau[2];

 var mapiece = $('#a').val(pi);
 var mavoiture = $('#b').val(vo);
 var oldqtte = $('#c').val(aq);

 $('#bouton_modifier_nb_piece').click(function(){

  var x = $('#a').val();
  var y = $('#b').val();
  var z = $('#c').val();
  var nouvelle_quantite = $('#qtte_stock_md').val();

   var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
              }); 

  $.ajax({
            url:"ajax/modification_nb_pieces.php",
            method:"POST",
            data:{piece:piece,voiture:voiture,ancienne_qtte:ancienne_qtte,nouvelle_quantite:nouvelle_quantite},
            success:function(data){
              console.log(data);
              const val = data.replace(/[\n\r]+/g, '');
              if(val==100){ Toast.fire({
          icon: 'success',
          title: 'Modification effectuée avec succès.'});
          setTimeout(function(){  window.location.reload(); }, 2000);}
            }
            });  

});

}
//++++++++++++++++++++++++++++++++++++++++++++++FUNCTIONS++++++++++++++++++++++++++++++++++++++++

   


</script>

</body>