<?php

include('./connection.php');

    function navigationList($active, $conn  ) {
include('./functions/functions.php');
      

?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/project-monitoring/admin/view_dashboard.php">
  <!-- <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
  <img class="app__logo" src="./img/app-logo.jpg" />
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Dashboard" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_dashboard" ? 'active': null?>">
  <a class="nav-link" href="view_dashboard.php">
  <i class="fas fa-chart-line"></i>
    <span>Dashboard</span></a>
</li>
<?php } ?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<?php 

$userLevel = $_SESSION['user_level']; 

if(true){

?>
<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item <?php echo $active == "view_equipment" ? 'active': null?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Equipments</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="./view_equipment.php">Add Equipments</a>
      <a class="collapse-item" href="./view_equipment_category.php">Equipment Categories</a>
    </div>
  </div>
</li> -->
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Equipments" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_equipment" ? 'active': null?>">
  <a class="nav-link" href="view_equipment.php">
  <i class="fas fa-boxes"></i>
    <span>Equipments</span></a>
</li>
<?php }  ?>
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Engineers" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_engineer" ? 'active': null?>">
  <a class="nav-link" href="view_engineer.php">
  <i class="fas fa-building"></i>
    <span>Engineers</span></a>
</li>
<?php }  ?>
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Foreman" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_foreman" ? 'active': null?>">
  <a class="nav-link" href="view_foreman.php">
  <i class="fas fa-hard-hat"></i>
    <span>Foreman</span></a>
</li>
<?php }  ?>
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Clients" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_client" ? 'active': null?>">
  <a class="nav-link" href="view_client.php">
  <i class="fas fa-address-card"></i>
    <span>Clients</span></a>
</li>
<?php }  ?>
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Projects" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_project" ? 'active': null?>">
  <a class="nav-link" href="view_project.php">
  <i class="fas fa-tasks"></i>
    <span>Projects</span></a>
</li>
<?php }  ?>
<?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Contractors" ) ) {  ?>
<li class="nav-item <?php echo $active == "view_contractor" ? 'active': null?>">
  <a class="nav-link" href="view_contractor.php">
  <i class="fas fa-file-signature"></i>
    <span>Contractors</span></a>
</li>
<?php }  ?>

<?php 
}
?>

<!-- Nav Item - Utilities Collapse Menu -->
<!-- NAVS -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

<?php
    }
?>