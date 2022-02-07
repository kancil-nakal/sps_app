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
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <?= $title; ?></h3>
                            <div class="card-tools">
                                <a href="<?= base_url('contacts/add'); ?>" class="btn btn-primary mr-2" ><i class="fas fa-plus mr-1"></i>Add Contact</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover" id="contactData" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Site</th>
                                        <th>Maps</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($contacts as $key => $data) : ?>
                                    <tr>
                                        <td><?= $data->service; ?></td>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->phone; ?></td>
                                        <td><?= $data->site; ?></td>
                                        <td><a class="badge badge-secondary" href="<?= ($data->maps != null) ? $data->maps : ''; ?>" <?= ($data->maps != null) ? 'target="_blank"' : ''; ?>><i class="fas fa-map-marked-alt mr-1"></i>Maps</a></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-item<?= $data->emergency_id; ?>" ><i class="fas fa-eye"></i> </a>
                                            <a class="btn btn-sm btn-danger" href="<?= base_url('contacts/del/') . $data->emergency_id; ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i> </a>
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
    
    <!-- modal -->
    <?php foreach($contacts as $key => $data) : ?>
    <div class="modal fade" id="modal-item<?= $data->emergency_id; ?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Contact Detail</h4>
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
                            <th>Contact Name</th>
                            <td><?= $data->name; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $data->phone; ?></td>
                        </tr>
                        <tr>
                            <th>Service</th>
                            <td><?= $data->service; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?= $data->address; ?></td>
                        </tr>
                        <tr>
                            <th>Maps</th>
                            <td><a class="badge badge-secondary" href="<?= ($data->maps != null) ? $data->maps : ''; ?>" <?= ($data->maps != null) ? 'target="_blank"' : ''; ?>><i class="fas fa-map-marked-alt mr-1"></i>Maps</a></td>
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



<script>
    $(document).ready(function() {
    $('#contactData').DataTable();
    } );
</script>