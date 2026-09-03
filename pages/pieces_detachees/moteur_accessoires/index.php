<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Casse Revelation</title>
  <?php 
  include('../../connexion.php');
  include('links_header.php'); ?>
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include('navbar.html');?>

  <!-- Main Sidebar Container -->

  <?php include('aside.php');?>
  
  
  

  <!-- Content Wrapper. Contains page content -->
  <?php include('content.php');?>

 
  <?php
  
  include('bas_page.html');
  ?>

</div>
<!-- ./wrapper -->
<?php include('links_footer.php'); ?>
  
</body>
</html>
