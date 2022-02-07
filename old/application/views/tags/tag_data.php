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
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="example2" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($admin_users as $key => $data) : ?>
                                <tr>
                                    <td><?= $data->name; ?></td>
                                    <td><?= $data->email; ?></td>
                                    <?php if($data->id_role == 6 ) :?>
                                        <td><div class="badge badge-pill badge-secondary">Administrator</div></td>
                                    <?php elseif ($data->id_role == 7) : ?>
                                        <td><div class="badge badge-pill badge-info">Operational</div></td>
                                    <?php endif ?>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info " href=""><i class="fas fa-eye"></i> </a>
                                        <a class="btn btn-xs btn-danger " href=""><i class="fas fa-trash-alt"></i> </a>
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