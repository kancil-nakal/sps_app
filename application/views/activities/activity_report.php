<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?= $title; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Form <?= $title; ?></h3>
                    <a href="#" class="btn btn-warning pull-right"><i class="fa fa-undo"></i> Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="<?= base_url('report/activity/export_pdf'); ?>" method="post">
                            <div class="col-md-4">
                                <label for="site">Site *</label>
                                <div class="form-group input-group <?= form_error('site') ? 'has-error' : ''; ?>">
                                    <input type="hidden" class="form-control" id="site_id" name="site_id" required>
                                    <input type="text" class="form-control" id="site" name="site" autocomplete="off" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-site">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="date">Date </label>
                                    <input class="form-control" type="date" id="date" name="date" value="<?= date('Y-m-d'); ?>" autocomplete="false">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary" type="submit" name="submit"><i class="fa fa-file-pdf-o"></i> Export Pdf</button>
                                </div>
                            </div>
                            <div class=" col-md-12">
                                <div class="form-group">
                                    <!-- <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-paper-plane"></i> Save</button> -->
                                    <button class="btn btn-secondary" type="reset" name="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


<div class="modal fade" id="modal-site">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-item">Select Site</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="listTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Site</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1;
                        foreach ($sites as $site) : ?>
                            <tr>
                                <td><?= $n++ ?></td>
                                <td style="width: 80%;"><?= $site['site']; ?> <small><i>(<?= $site['site_id']; ?>)</i></small></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="selectSite" data-id="<?= $site['site_id']; ?>" data-site="<?= $site['site']; ?>"><i class=" fa fa-check"></i> Select</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on('click', '#selectSite', function() {
            var site_id = $(this).data('id');
            var site = $(this).data('site');
            $('#site_id').val(site_id);
            $('#site').val(site);
            $('#modal-site').modal('hide');
        })
    })
</script>