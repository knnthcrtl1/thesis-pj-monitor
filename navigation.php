<?php

include('./connection.php');

    function navigationList($active, $conn  ) {
// include('./functions/functions.php');
      

?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/project-monitoring/view_dashboard.php">
  <!-- <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
  <img class="app__logo" src="admin/img/app-logo.jpg" />
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $active == "view_dashboard" ? 'active': null?>">
  <a class="nav-link" href="view_dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  <!-- Interface -->
</div>

<?php 

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

<li class="nav-item <?php echo $active == "view_notification" ? 'active': null?>">
  <a class="nav-link" href="view_notification.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Notifications</span></a>
</li>

<li class="nav-item <?php echo $active == "view_project" ? 'active': null?>">
  <a class="nav-link" href="view_project.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Projects</span></a>
</li>





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