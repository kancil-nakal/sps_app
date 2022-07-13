<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPS | <?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/bower_components/select2/dist/css/select2.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor') ?>/plugins/timepicker/bootstrap-timepicker.min.css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-yellow sidebar-mini fixed">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('dashboard') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>PS</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SPS</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/vendor') ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->name ?></span>

                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/vendor') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $this->fungsi->user_login()->name ?>
                                        <small>Admin</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/vendor') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fungsi->user_login()->name ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url('dashboard') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'checkpoint'  ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url('checkpoint') ?>">
                            <i class="fa fa-rss"></i> <span>Checkpoint</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'activity'  ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url('activity') ?>">
                            <i class="fa fa-calendar-check-o"></i> <span>Aktivities</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'visitor'  ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url('visitor') ?>">
                            <i class="fa fa-user-secret"></i> <span>Visitor</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>


                    <?php if ($this->fungsi->user_login()->id_role == 6 || $this->fungsi->user_login()->id_role == 2 || $this->fungsi->user_login()->id_role == 7 || $this->fungsi->user_login()->id_role == 4) : ?>
                        <li class="header">MANAGE</li>
                        <li class="treeview <?= $this->uri->segment(1) == 'report' ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Report</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu ">
                                <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'checkpoint'  ? 'class="active"' : ''; ?>>
                                    <a href="<?= base_url('report/checkpoint'); ?>">
                                        <i class="fa fa-circle-o"></i> <span>Checkpoint Report</span>
                                    </a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'activity'  ? 'class="active"' : ''; ?>>
                                    <a href="<?= base_url('report/activity'); ?>">
                                        <i class="fa fa-circle-o"></i> <span>Activity Report</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>


                    <?php if ($this->fungsi->user_login()->id_role == 6 || $this->fungsi->user_login()->id_role == 2 || $this->fungsi->user_login()->id_role == 7) : ?>
                        <li class="treeview <?= $this->uri->segment(1) == 'site' || $this->uri->segment(1) == 'tag' || $this->uri->segment(1) == 'contact' ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Manage Data</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu ">
                                <li <?= $this->uri->segment(1) == 'site'  ? 'class="active"' : ''; ?>>
                                    <a href="<?= base_url('site'); ?>">
                                        <i class="fa fa-building-o"></i> <span>Manage Site</span>
                                    </a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'tag'  ? 'class="active"' : ''; ?>>
                                    <a href="<?= base_url('tag'); ?>">
                                        <i class="fa fa-tag"></i> <span>Tag</span>
                                    </a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'contact'  ? 'class="active"' : ''; ?>>
                                    <a href="<?= base_url('contact'); ?>">
                                        <i class="fa fa-phone"></i> <span>Contact</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    <?php endif ?>

                    <li class="header">SETTING</li>
                    <?php if ($this->fungsi->user_login()->id_role == 2) : ?>
                        <li <?= $this->uri->segment(1) == 'user'  ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url('user'); ?>">
                                <i class="fa fa-users"></i> <span>User</span>
                            </a>
                        </li>
                    <?php endif ?>
                    <li>
                        <a href="<?= base_url('auth/logout'); ?>">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- jQuery 3 -->
        <script src="<?= base_url() ?>assets/vendor/bower_components/jquery/dist/jquery.min.js"></script>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents; ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?> <a href="https://tpmgroup.id">TPM Groupo</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/vendor') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('assets/vendor') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/vendor') ?>/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/vendor') ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/vendor'); ?>/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/vendor') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js" defer></script>
    <script src="<?= base_url('assets/vendor') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" defer></script>
    <!-- CK Editor -->
    <!-- <script src="<?= base_url('assets/vendor') ?>/bower_components/ckeditor/ckeditor.js"></script> -->
    <!-- date-range-picker -->
    <script src="<?= base_url('assets/vendor') ?>/bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/vendor') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?= base_url('assets/vendor') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?= base_url('assets/vendor') ?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->


    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })

        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
            $('#dataAtt').DataTable({
                'ordering': true,
                "lengthMenu": [
                    [15, 30, 50, 100, -1],
                    [15, 30, 50, 100, "All"]
                ]
            })
            $('#dataActivity').DataTable({
                "ordering": true,
                "lengthMenu": [
                    [15, 30, 50, 100, -1],
                    [15, 30, 50, 100, "All"]
                ]

            })
            $('#listTable').DataTable({
                "ordering": true,
                "lengthMenu": [
                    [15, 30, 50, 100, -1],
                    [15, 30, 50, 100, "All"]
                ]

            })
        })

        // $(function() {
        //     // Replace the <textarea id="editor1"> with a CKEditor
        //     // instance, using default configuration.
        //     CKEDITOR.replace('editor1')
        //     //bootstrap WYSIHTML5 - text editor
        //     $('.textarea').wysihtml5()
        // })

        // Date range picker
        // $('#reservation').daterangepicker()
        //Date range picker
        // $('#reservation').daterangepicker()
        $(function() {

            $('#reservation').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#reservation').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
            });

            $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });

        $('.timepicker').timepicker({
            showInputs: false
        })
    </script>
</body>

</html>