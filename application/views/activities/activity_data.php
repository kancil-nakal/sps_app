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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover" id="dataActivity">
                        <thead>
                            <tr>
                                <th class="text-center" width="10px">No</th>
                                <th class="text-center" width="60px">Tanggal</th>
                                <th class="text-center" width="30px">Jam</th>
                                <th class="text-center" width="200px">Site</th>
                                <th class="text-center" width="200px">Anggota</th>
                                <th class="text-center" width="300px">Kegiatan</th>
                                <th class="text-center" width="30px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($activities as $activity) : ?>
                                <tr>
                                    <td class="text-center"><?= $n++; ?></td>
                                    <td class="text-center"><?= indo_date($activity['date_time']); ?></td>
                                    <td class="text-center"><?= indo_time($activity['date_time']); ?></td>
                                    <td><?= $activity['site']; ?></td>
                                    <td><?= $activity['name']; ?></td>
                                    <td><?= $activity['activity']; ?></td>
                                    <td class="text-center">
                                        <a href="" id="set_detail" class="badge badge-sm bg-green" data-toggle="modal" data-target="#modal-activity" data-anggota="<?= $activity['name']; ?>" data-kegiatan="<?= $activity['activity']; ?>" data-images="<?= $activity['images']; ?>"><i class="fa fa-eye"></i> view</a>
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

<div class="modal fade" id="modal-activity">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Activity</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th class="text-center">Anggota</th>
                            <td><span id="anggota"></span></td>
                        </tr>
                        <tr>
                            <th class="text-center">Kegiatan</th>
                            <td><span id="activity"></span></td>
                        </tr>
                        <tr>
                            <th class="text-center">Dokumentasi</th>
                            <!-- <td><span id="images"></span></th> -->
                            <td><img src="" width="200px" id="images"></img></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_detail', function() {
            var anggota = $(this).data('anggota');
            var kegiatan = $(this).data('kegiatan');
            var images = $(this).data('images');
            $('#anggota').text(anggota);
            $('#activity').text(kegiatan);
            // $('#images').text(images);
            $('#images').attr("src", "https://hris.tpm-facility.com/assets/imagesofgms/activities/" + images);
        })
    })
</script>