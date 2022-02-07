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
                    <a href="<?= base_url('tag/add'); ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-striped table-bordered table-hover" id="listTable">
                        <thead>
                            <tr>
                                <th class="text-center" width="10px">No</th>
                                <th class="text-center" width="200px">ID</th>
                                <th class="text-center" width="">Site</th>
                                <th class="text-center" width="">Label</th>
                                <th class="text-center" width="30px">Active</th>
                                <th class="text-center" width="">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($tags as $tag) : ?>
                                <tr>
                                    <td class="text-center"><?= $n++; ?></td>
                                    <td class="text-center"><?= $tag['tagid']; ?></td>
                                    <td><?= $tag['site']; ?></td>
                                    <td><?= $tag['label'] ?> </td>
                                    <td class="text-center"><?= $tag['is_active'] == 1 ? '<span class="text-success"><i class="fa fa-check"></i></span>' : '<span class="text-danger"><i class="fa fa-ban"></i></span>';; ?> </td>
                                    <td class="text-center">
                                        <?php if ($tag['is_active'] == 1) {
                                            $status  = 'Aktif';
                                        } else {
                                            $status =  'Tidak Aktif';
                                        }
                                        ?>
                                        <a id="set_detail" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-detail" data-tagid="<?= $tag['tagid']; ?>" data-site="<?= $tag['site']; ?>" data-label="<?= $tag['label']; ?>" data-location="<?= $tag['location']; ?>" data-status="<?= $status; ?>"><i class="fa fa-eye"></i> Detail</a>
                                        <a href="<?= base_url('tag/edit/') . $tag['nfcid']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-cog"></i> Update</a>
                                    </td>
                                </tr>
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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Tag</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Tag ID</th>
                            <td><span id="tagid"></span></td>
                        </tr>
                        <tr>
                            <th>Site</th>
                            <td><span id="site"></span></td>
                        </tr>
                        <tr>
                            <th>Label</th>
                            <td><span id="label"></span></td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td><span id="location"></span></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="label label-default" id="status"></span>
                            </td>
                        </tr>

                        <!-- <tr>
                            <th>Action</th>
                            <td>
                                <a href="<?= base_url('asset/edit/' . $asset['asset_id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Update</a>
                                <a href="<?= base_url('asset/del/' . $asset['asset_id']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_detail', function() {
            var tagid = $(this).data('tagid');
            var site = $(this).data('site');
            var label = $(this).data('label');
            var location = $(this).data('location');
            var status = $(this).data('status');
            $('#tagid').text(tagid);
            $('#site').text(site);
            $('#label').text(label);
            $('#location').text(location);
            $('#status').text(status);
        })
    })
</script>