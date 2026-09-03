
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>


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
// CHARGEMENT DU FORMULAIRE DE MODIFICATION AVEC LES ANCIENNES DONNEES 
    function affiche_modif(id_mecano){
    
    var id = id_mecano;

            $.ajax({
              url:"ajax/modification.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              console.log(data);
              $('#formulaire_edition_mecano').html(data);
            }
            });
}
//MISE A JOUR DES NOUVELLES DONNEES
    $('#bouton_modifier_mecano').click(function(){

      var id = $('#id_mecano').val();
      var nom_mecano = $('#nom_mecano').val();
      var adresse_mecano = $('#adresse_mecano').val();
      var numero_telephone = $('#numero_telephone').val();
      
      
      $.ajax({
       url:"ajax/traitement_modification.php",
       method:"POST",
      data:{id:id,nom_mecano:nom_mecano,adresse_mecano:adresse_mecano,numero_telephone:numero_telephone},
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
//SUPPRESSION D'UN CLIENT 
// CHARGEMENT DU FORMULAIRE DE MODIFICATION AVEC LES ANCIENNES DONNEES 
function affiche_del(id){
    
    var id_mecano= id;
 

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
            $('#bouton_supprimer_mecano').click(function(){
              
              
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
            data:{id_mecano:id_mecano},
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


//ENREGISTREMENT DANS LA BDD
$('#boutton_enregistrer_mecano').click(function(){

 

  var nom_mecano = $('#nom_mecano').val();
  var adresse_mecano =  $('#adresse_mecano').val();
  var num_tel_mecano =  $('#num_tel_mecano').val();

  
        $.ajax({
        url:"ajax/enregistrer.php",
        method:"POST",
        data:{nom_mecano:nom_mecano,adresse_mecano:adresse_mecano,num_tel_mecano:num_tel_mecano},
        success:function(data){
          console.log(111);
          const val = data.replace(/[\n\r]+/g, '');
          console.log(val);
          if(val==1){ Toast.fire({
          icon: 'success',
          title: 'Enregistrement effectué avec succès.'});
          setTimeout(function(){  window.location.reload(); }, 2000);}
          if(val==0){ Toast.fire({
            icon: 'error',
          title: 'Tous les champs sont obligatoires.'});
        }
        }
        });
});
</script>
</body>