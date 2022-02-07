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
                                    <th>Team</th>
                                    <th>Position</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teams as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->site; ?></td>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->position; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-info " data-toggle="modal" data-target="#modal-item<?= $data->nik; ?>"><i class="fas fa-eye"></i> Detail</a>
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
<?php foreach ($teams as $key => $data) : ?>
    <div class="modal fade" id="modal-item<?= $data->nik; ?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Team Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><?= $data->name; ?> <?php if ($data->resign_date == null) : ?>
                                        <span class="badge badge-success">Active</span>
                                    <?php else : ?>
                                        <span class="badge badge-secondary">Non-Active</span>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>ID Card</th>
                                <td><?= $data->id_card; ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $data->phone; ?></td>
                            </tr>
                            <tr>
                                <th>Born City</th>
                                <td><?= $data->born_city ?></td>
                            </tr>
                            <tr>
                                <th>Birth</th>
                                <td><?= $data->birthday; ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?= $data->gender == 1 ? 'Laki-laki' : 'Perempuan'; ?></td>
                            </tr>
                            <tr>
                                <th>Religion</th>
                                <td><?= $data->religion; ?></td>
                            </tr>
                            <tr>
                                <th>Address Domisili</th>
                                <td><?= $data->domisili; ?></td>
                            </tr>
                            <tr>
                                <th>Site</th>
                                <td><?= $data->site; ?></td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td><?= $data->position; ?></td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <?php if ($data->resign_date == null) : ?>
                                    <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-file-download mr-1"></i> Export</button></td>
                                <?php else : ?>
                                    <td><button type="button" class="btn btn-success btn-sm" disabled><i class="fas fa-file-download mr-1"></i> Export</button></td>
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