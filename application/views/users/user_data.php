<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $title; ?>
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
                    <h3 class="box-title"><?= $title; ?> List</h3>
                    <a href="<?= base_url('user/add'); ?>" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-striped table-bordered table-hover" id="listTable">
                        <thead>
                            <tr>
                                <th class="text-center" width="10px">No</th>
                                <th class="text-center" width="">Name</th>
                                <th class="text-center" width="300">Email</th>
                                <th class="text-center" width="100px">Role</th>
                                <th class="text-center" width="300px">Site</th>
                                <th class="text-center" width="150px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($users as $user) : ?>
                                <?php if ($user['id_role'] == 4 || $user['id_role'] == 6 || $user['id_role'] == 7 || $user['id_role'] == 8) : ?>
                                    <tr>
                                        <td class="text-center"><?= $n++; ?></td>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <?php if ($user['id_role'] == 6) : ?>
                                            <td class="text-center"><span class="label label-default">Admin</span></td>
                                        <?php elseif ($user['id_role'] == 7) : ?>
                                            <td class="text-center"><span class="label label-primary">Operational</span></td>
                                        <?php elseif ($user['id_role'] == 8) : ?>
                                            <td class="text-center"><span class="label bg-orange">Danru</span></td>
                                        <?php elseif ($user['id_role'] == 4) : ?>
                                            <td class="text-center"><span class="label bg-teal">Client</span></td>
                                        <?php endif ?>
                                        <td class="text-center"><?= $user['site'] == null ? 'ALL' : $user['site']; ?></td>
                                        <td class="text-center">
                                            <form action="<?= base_url('user/delete'); ?>" method="post">
                                                <a href="<?= base_url('user/edit/') . $user['id']; ?>" class="label label-warning"><i class="fa fa-cog"></i> Update</a>
                                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                                <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </tbody>

                    </table>
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