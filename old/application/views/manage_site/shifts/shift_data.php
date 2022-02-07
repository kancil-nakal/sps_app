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
                            <a class="btn btn-primary mr-2" href="<?= base_url('manage_site/shift/add'); ?>"><i class="fas fa-plus mr-1"></i>Add shift</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="example1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Pattren</th>
                                    <th>Code</th>
                                    <th>Shift</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th width="300px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shifts as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->pattern; ?> Jam</td>
                                        <td><?= $data->shift_code; ?></td>
                                        <td><?= $data->shift; ?></td>
                                        <td><?= $data->time_in; ?></td>
                                        <td><?= $data->time_out; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-danger" href="<?= base_url('manage_site/shift/del/') . $data->shift_id;  ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i> Delete</a>
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