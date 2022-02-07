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
                                    <th>Tag</th>
                                    <th>Status</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tags as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->site; ?></td>
                                        <td><?= $data->nfcid; ?></td>
                                        <?php if ($data->gms_status == 1) : ?>
                                            <td><span class="badge badge-success">Active</span></td>
                                        <?php elseif ($data->gms_status == 0) : ?>
                                            <td><span class="badge badge-secondary">Non-Active</span></td>
                                        <?php endif ?>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary " href="<?= base_url('tags/attendance_tags/edit/') . $data->site_id ?>"><i class="fas fa-edit"></i> </a>
                                            <a class="btn btn-sm btn-danger " href="<?= base_url('tags/attendance_tags/del/') . $data->site_id ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i> </a>
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