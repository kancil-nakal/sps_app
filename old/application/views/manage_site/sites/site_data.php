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
                <?= $this->session->flashdata('message') ?>
                <div class="card row">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                        <div class="card-tools ml-auto">
                            <!-- <a class="btn btn-primary mr-2" href="<?= base_url('tags/attendance_tags/add'); ?>"><i class="fas fa-plus mr-1"></i>Add Checkpoint Tags</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="example1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Site</th>
                                    <th>Gms Status</th>
                                    <th width="300px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sites as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->site; ?></td>
                                        <?php if ($data->gms_status == 1) : ?>
                                            <td><span class="badge badge-success">Active</span></td>
                                        <?php elseif ($data->gms_status == 0) : ?>
                                            <td><span class="badge badge-secondary">Non-Active</span></td>
                                        <?php endif ?>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-info " data-toggle="modal" data-target="#modal-item<?= $data->site_id; ?>"><i class="fas fa-eye"></i> Detail</a>
                                            <a class="btn btn-xs btn-primary" href="<?= base_url('manage_site/sites/checkpoints/') . $data->site_id ?>"><i class="fas fa-tags"></i> Tags</a>
                                            <a class="btn btn-xs btn-warning text-light" href="<?= base_url('manage_site/sites/teams/') . $data->site_id ?>"><i class="fas fa-users"></i> Teams</a>
                                            <!-- <a class="btn btn-xs btn-warning text-light" href="<?= base_url('manage_site/sites/attendance_log/') . $data->site_id ?>"><i class="fas fa-users"></i> Attendance</a>
                                            <a class="btn btn-xs btn-warning text-light" href="<?= base_url('manage_site/sites/checkpoint_log/') . $data->site_id ?>"><i class="fas fa-users"></i> Checkpoint</a>
                                            <a class="btn btn-xs btn-warning text-light" href="<?= base_url('manage_site/sites/activity_log/') . $data->site_id ?>"><i class="fas fa-users"></i> Activity</a> -->
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<!-- /.content -->


<!-- modal detail -->
<?php foreach ($sites as $key => $data) : ?>
    <div class="modal fade" id="modal-item<?= $data->site_id; ?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Site Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th>Site</th>
                                <td><?= $data->site; ?></td>
                            </tr>
                            <tr>
                                <th>Service</th>
                                <td><?= $data->id_service == 1 ? 'SECURITY' : ''; ?></td>
                            </tr>
                            <tr>
                                <th>Region</th>
                                <td><?= $data->region; ?></td>
                            </tr>
                            <tr>
                                <th>Shift Pattren</th>
                                <td><?= $data->shift_pattern; ?> Jam</td>
                            </tr>
                            <tr>
                                <th>Attendance Tags</th>
                                <td><?= $data->nfcid; ?></td>
                            </tr>
                            <tr>
                                <th>GMS Status</th>
                                <?php if ($data->gms_status == 1) : ?>
                                    <td><span class="badge badge-success">Active</span></td>
                                <?php elseif ($data->gms_status == 0) : ?>
                                    <td><span class="badge badge-secondary">Non-Active</span></td>
                                <?php endif ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>