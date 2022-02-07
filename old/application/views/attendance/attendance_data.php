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
                        <table class="table table-bordered table-striped table-hover" id="dataAtt" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Site</th>
                                    <th>Tag ID</th>
                                    <!-- <th>Shift</th> -->
                                    <th>Current Date Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php foreach ($attendances as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->site; ?></td>
                                        <td><?= $data->tagid; ?></td>
                                        <td></td>
                                        <td><?= $data->currentdatetime; ?> - 
                                        <?php if($data->checkin == 1) : ?>
                                            <span class="badge badge-info">Check in</span>
                                        <?php else : ?>
                                            <span class="badge badge-secondary">Check out</span>
                                        <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
    $('#dataAtt').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?=site_url('attendance/get_ajax')?>"
    } );
} );
</script>