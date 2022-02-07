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
                            <!-- <a class="btn btn-primary mr-2" href="<?= base_url('manage_site/shift/add'); ?>"><i class="fas fa-plus mr-1"></i>Add shift</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="example1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width="100px">Date</th>
                                    <th>Site</th>
                                    <th>Team</th>
                                    <th>Subject</th>
                                    <th width="80px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($incidents as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->thedate . ' <br>' . $data->thetime; ?> </td>
                                        <td><?= $data->site; ?></td>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->title; ?></td>
                                        <td><a href="" class="btn btn-success"><i class="fas fa-file-export mr-1"></i>Export</a></td>
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