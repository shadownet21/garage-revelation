<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Garage Revelation | Log in </title>
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Garage</b>Révélation</a><i class="fas fa-tools sm-2 mr-2"></i>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez-vous pour démarrer</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Code usager" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Mot de passe" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-success" id="connect">
          <i class="fab fa-yandex mr-2"></i> Se connecter
        </a>
        <div id="spinner"></div>
      
      </div>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<?php 

include('links_footer.php');

?>
<script>

//TRAITEMENT AU BOUTON ENTER
$(document).keypress(function(e) {

  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
              });
            //$('#spinner').html('<br><div class="spinner-border text-primary" role="status"></div>');

           var username = $('#username').val();
           var password = $('#password').val();


           $.ajax({
                      url:"ajax/traitement.php",
                      method:"POST",
                      data:{username:username,password:password},
                      success:function(data){
                      console.log(data);

     const val = data.replace(/[\n\r]+/g, '');        
                      if(val==1)
        { 
          Toast.fire({
            icon: 'success',
            title: 'Connexion réussie. Bienvenu!'});
            setTimeout(function() {window.location.href = "accueil.php"},1000);
       
      }

       if(val==0)
       { Toast.fire({
          icon: 'error',
        title: '<p style="color:red; margin-top:15px">Nom usager ou mot de passe incorrect.</p>'});
        $('#password').val("");
       }

       if(val==2)
       { Toast.fire({
          icon: 'error',
        title: '<p style="color:red; margin-top:15px">Tous les champs sont obligatoires.</p>'})
       }
                     

          
        }
})
  };})
//TRAITEMENT AU CLICK

          $('#connect').click(function(){
       
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
              });
            //$('#spinner').html('<br><div class="spinner-border text-primary" role="status"></div>');

           var username = $('#username').val();
           var password = $('#password').val();

           $.ajax({
                      url:"ajax/traitement.php",
                      method:"POST",
                      data:{username:username,password:password},
                      success:function(data){
                      console.log(data);

     const val = data.replace(/[\n\r]+/g, '');        
                      if(val==1)
        { 
          Toast.fire({
            icon: 'success',
            title: 'Connexion réussie. Bienvenu!'});
            setTimeout(function() {window.location.href = "accueil.php"},1000);
       
      }

       if(val==0)
       { Toast.fire({
          icon: 'error',
        title: '<p style="color:red; margin-top:15px">Nom usager ou mot de passe incorrect.</p>'});
        $('#password').val("");
       }

       if(val==2)
       { Toast.fire({
          icon: 'error',
        title: '<p style="color:red; margin-top:15px">Tous les champs sont obligatoires.</p>'})
       }
                     

          
        }
});

          });
</script>
</body>
</html>
