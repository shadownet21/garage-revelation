
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

$('#boutton_rechercher_facture').click(function(){


   
var date_start = $('#date_start').val();
var date_end= $('#date_end').val();



    $.ajax({
          url:"ajax/rechercher.php",
          method:"POST",
          data:{date_start:date_start,date_end:date_end},
          success:function(data){
            //console.log(data);
            const val = data.replace(/[\n\r]+/g, '');
            console.log(val);
            if(val==0){ Toast.fire({
        icon: 'error',
        title: 'Les deux dates sont obligatoires.'});
        }

          if(val==111){ Toast.fire({
        icon: 'error',
        title: 'La date début doit être ultérieure à la date fin !'}); }
    
          if(val==1){ Toast.fire({
        icon: 'error',
        title: 'Aucune vente enrégistrée au cours de cette période'}); }
       
      
       if(date_start!=='' && date_end !=='')
       {
        $('#datedebut').html('entre le ' +date_start+' et le');
        $('#et').html(et);
        $('#datefin').html(date_end);
       }
       
            if((val!=='1') || (val!=='11')) { $('#affiche_result').html(data); };
            if(val=='111') { $('#affiche_result').html(""); };
            
          }
          });  

});


function details_facture(id)
{
  var id_facture = id;
  $.ajax({
          url:"ajax/details_facture.php",
          method:"POST",
          data:{id_facture:id_facture},
          success:function(data){
            //console.log(data);
            const val = data.replace(/[\n\r]+/g, '');
            console.log(val);
            
            $('#modal_detail').html(data);
          
            
          }
          }); 
  
}


//++++++++++++++++++++++++++++++++++++++++++++++FUNCTIONS++++++++++++++++++++++++++++++++++++++++

   


</script>

</body>