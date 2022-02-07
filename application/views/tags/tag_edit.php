<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $title; ?>s
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
                    <h3 class="box-title">Form Tag</h3>
                    <a href="<?= base_url('tag'); ?>" class="btn btn-warning pull-right"><i class="fa fa-undo"></i> Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="" method="post">
                            <input type="hidden" class="form-control" id="nfcid" name="nfcid" value="<?= $gnt['nfcid']; ?>">
                            <div class="col-md-6">
                                <div>
                                    <label for="site">Site *</label>
                                </div>
                                <div class="form-group input-group <?= form_error('site') ? 'has-error' : ''; ?>">
                                    <!-- <input type="hidden" class="form-control" id="site_id" name="site_id"> -->
                                    <input type="text" class="form-control" id="site" name="site" value="<?= $gnt['site']; ?>" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="label">Label *</label>
                                    <input class="form-control" type="label" id="label" name="label" value="<?= $gnt['label']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <textarea type="text" class="form-control" id="location" name="location" style="height: 150px;"><?= $gnt['location'];; ?></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idtag">Tag ID</label>
                                    <input class="form-control" type="idtag" id="idtag" name="idtag" value="<?= $gnt['tagid']; ?>" readonly>
                                </div>


                                <div class="form-group ">
                                    <label for="status">Status *</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" <?= $gnt['is_active'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="0" <?= $gnt['is_active'] == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-paper-plane"></i> Save</button>
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