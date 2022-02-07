<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Checkpoint Tags</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title; ?></h3>
                            <div class="card-tools">
                                <a href="<?= base_url('tags/checkpoint_tags'); ?>" class="btn btn-warning  mr-2 text-light"><i class="fas fa-undo mr-1"></i>Back</a>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 ">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="site" class=" form-control-label">Site</label>
                                        <div class="input-group">
                                            <input type="hidden" id="siteid" name="siteid" class="form-control" >
                                            <input type="text" id="site" name="site" class="form-control" readonly required autofocus>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-site"><i class="fas fa-search"></i></button>
                                            </span>
                                            <?= form_error('site', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tagid" class=" form-control-label">Tag ID</label>
                                        <div class="input-group">
                                            <input type="text" id="tagid" name="tagid" class="form-control" required>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tags"><strong>Scan</strong></button>
                                            </span>
                                            <?= form_error('tagid', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label for="label" class=" form-control-label">Label <small>(Chekpoint 1,2,3)</small></label>
                                        <input type="label" id="label" name="label" class="form-control" required>
                                        <?= form_error('label', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class=" form-group">
                                        <label for="location" class=" form-control-label">Location</label>
                                        <textarea type="text" id="location" name="location" class="form-control" required></textarea>
                                        <?= form_error('location', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="status" type="checkbox" id="customCheckbox1" value="1" checked>
                                            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                            <label for="customCheckbox1" class="custom-control-label">Active</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Submit</button>
                                        <button type="reset" name="reset" class="btn btn-default"><i class="fas fa-sync-alt"></i> Reset</button>
                                    </div>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-site" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Site</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body table-responsive">
            <table class="table table-bordered table-striped" id="siteData">
                    <thead>
                        <tr>
                            <th>Site</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sites as $key => $data) : ?>
                            <tr>
                                <td><?= $data->site; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->site_id; ?>" data-site="<?= $data->site; ?>"><i class="fa fa-check"></i> Select</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
     </div>

     <script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var site_id = $(this).data('id');
            var site = $(this).data('site');
            
            $('#siteid').val(site_id);
            $('#site').val(site);
            $('#modal-site').modal('hide');
        })
    })
    </script>

     <div class="modal fade" id="modal-tags" style="display: none;" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Scan Checkpoint Tags</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body table-responsive">
                <form action="" method="post">
                <div class="form-group">
                    <input type="nfcid" id="nfcid" name="nfcid" class="form-control" autofocus>
                    <?= form_error('nfcid', '<small class="text-danger">', '</small>'); ?>
                </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
     </div>

    <script>
        $(document).ready(function() {
        $('#siteData').DataTable();
        } );
    </script>


