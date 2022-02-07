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
                            <a class="btn btn-warning mr-2 text-light" href="<?= base_url('manage_site/sites'); ?>"><i class="fas fa-undo mr-1"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="example1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Site</th>
                                    <th>Team</th>
                                    <th>Position</th>
                                    <th width="300px">Action</th>
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