<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GMS | <?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/templates/backend'); ?>/dist/css/adminlte.min.css">
  <!-- Data Tables -->
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/plugins/data-tables/datatables.min.css"/> -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown">
            <i class="fas fa-ellipsis-h"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Profile</span>
            <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> <?= $this->fungsi->user_login()->name ?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> <?= $this->fungsi->user_login()->email ?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> <?= $this->fungsi->user_login()->id_role ?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> <?= $this->fungsi->user_login()->id ?>
            </a>
            <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
            <span class="dropdown-item dropdown-header">Setting</span>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer"></a>
          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('assets/templates/backend'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>GMS</strong></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets/templates/backend'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $this->fungsi->user_login()->name ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">MAIN NAVIGATION</li>
            <li class="nav-item">
              <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($this->uri->segment(1) == 'dashboard' ? 'active' : '') ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashoard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('attendance') ?>" class="nav-link <?= ($this->uri->segment(1) == 'attendance' ? 'active' : '') ?>">
                <i class="nav-icon fas fa-user-check"></i>
                <p>
                  Attendance
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('checkpoints') ?>" class="nav-link <?= ($this->uri->segment(1) == 'checkpoints' ? 'active' : '') ?>">
                <i class="nav-icon fas fa-map-pin"></i>
                <p>
                  Checkpoint
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('activities') ?>" class="nav-link <?= ($this->uri->segment(1) == 'activities' ? 'active' : '') ?>">
                <i class="nav-icon far fa-clipboard"></i>
                <p>
                  Activity
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Manage Team
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="<?= base_url('manage_team/teams') ?>" class="nav-link <?= ($this->uri->segment(1) == 'manage_team' || $this->uri->segment(2) == 'teams' ? 'active' : '') ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teams</p>
                  </a>
                </li>
              </ul>
            </li>

            <?php if ($this->fungsi->user_login()->id_role == 6 || $this->fungsi->user_login()->id_role == 7) : ?>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Manage Site
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('manage_site/sites') ?>" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sites</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="../charts/chartjs.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Schedule</p>
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a href="<?= base_url('manage_site/shift') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Shift</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Report
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('report/activity') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Activity Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../charts/chartjs.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Attendance Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('report/incident') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Incident Report</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="../charts/chartjs.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Schedule Report</p>
                    </a>
                  </li> -->
                </ul>
              </li>
            <?php endif ?>

            <?php if ($this->fungsi->user_login()->id_role == 6 || $this->fungsi->user_login()->id_role == 7) : ?>
              <li class="nav-header">SETTING</li>
            <?php endif ?>

            <?php if ($this->fungsi->user_login()->id_role == 6) : ?>
              <li class="nav-item">
                <a href="<?= base_url('users'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('users'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>NFC Tags</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('tags/attendance_tags'); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Attendance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('tags/checkpoint_tags'); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Checkpoint</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php endif ?>
            <?php if ($this->fungsi->user_login()->id_role == 6 || $this->fungsi->user_login()->id_role == 7) : ?>
              <li class="nav-item">
                <a href="<?= base_url('contacts'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-phone"></i>
                  <p>Contact</p>
                </a>
              </li>
            <?php endif ?>


            <li class="nav-header">OTHER</li>
            <li class="nav-item">
              <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- jQuery -->
      <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>

      <?= $contents; ?>

    </div>
    <!-- /.content-wrapper -->



    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 2.1.0
      </div>
      <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://tpmgroup.id">TPMGroup.id</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/templates/backend'); ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/templates/backend'); ?>/dist/js/demo.js"></script>
  <!-- DataTables -->
  <!-- <script type="text/javascript" src="<?= base_url('assets'); ?>/plugins/data-tables/datatables.min.js"></script> -->
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>

</html>