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
                    <li class="breadcrumb-item">Contacts</li>
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
                            <a href="<?= base_url('contacts'); ?>" class="btn btn-warning  mr-2 text-light"><i class="fas fa-undo mr-1"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 ">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="site" class=" form-control-label">Site</label>
                                    <div class="input-group">
                                        <input type="hidden" id="siteid" name="siteid" class="form-control">
                                        <input type="text" id="site" name="site" class="form-control" required autofocus>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-item"><i class="fas fa-search"></i></button>
                                        </span>
                                        <?= form_error('site', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="namecontact" class=" form-control-label">Contact Name</label>
                                    <input type="text" id="namecontact" name="namecontact" class="form-control" required>
                                    <?= form_error('namecontact', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group">
                                    <label for="phone" class=" form-control-label">Phone</label>
                                    <input type="phone" id="phone" name="phone" class="form-control">
                                    <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group">
                                    <label for="service" class=" form-control-label">Service</label>
                                    <select name="service" id="service" class="form-control form-control" required>
                                        <option value="" selected>-- Select service --</option>
                                        <option value="HO-TPM">HO-TPM</option>
                                        <option value="Polisi">Polisi</option>
                                        <option value="Rumah Sakit">Rumah Sakit</option>
                                        <option value="Ambulan">Ambulan</option>
                                        <option value="Pemadam Kebakaran">Pemadam Kebakaran</option>
                                        <option value="Pemadam Kebakaran">Lainnya</option>
                                        <!-- <option value="FBI">FBI</option>
                                            <option value="NASA">NASA</option>
                                            <option value="National Geograpic">National Geograpic</option>
                                            <option value="WHO">WHO</option> -->
                                    </select>
                                    <?= form_error('service', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group">
                                    <label for="address" class=" form-control-label">Address</label>
                                    <textarea type="text" id="address" name="address" class="form-control"></textarea>
                                    <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="maps" class=" form-control-label">Google Maps (URL)</label>
                                    <input type="url" id="maps" name="maps" class="form-control">
                                    <?= form_error('maps', '<small class="text-danger">', '</small>'); ?>
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

<div class="modal fade" id="modal-item" style="display: none;" aria-hidden="true">
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
        $('#siteData').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var site_id = $(this).data('id');
            var site = $(this).data('site');

            $('#siteid').val(site_id);
            $('#site').val(site);
            $('#modal-item').modal('hide');
        })
    })
</script>