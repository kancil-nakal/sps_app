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
                    <li class="breadcrumb-item">Contacts</li>
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
                        <div class="card-tools">
                            <a href="<?= base_url('users'); ?>" class="btn btn-warning  mr-2 text-light"><i class="fas fa-undo mr-1"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 ">
                            <form action="" method="post">
                                <div class="form-group <?= form_error('name') ? 'has-error' : ''; ?>">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" value="<?= set_value('name'); ?>" id="name" name="name">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group <?= form_error('username') ? 'has-error' : ''; ?>">
                                    <label for="email">Email *</label>
                                    <input type="text" class="form-control" value="<?= set_value('email'); ?>" id="email" name="email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group <?= form_error('password1') ? 'has-error' : ''; ?>">
                                    <label for="password1">Password *</label>
                                    <input type="password" class="form-control" id="password1" name="password1">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group <?= form_error('password2') ? 'has-error' : ''; ?>">
                                    <label for="password2">Password Confirmation *</label>
                                    <input type="password" class="form-control" id="password2" name="password2">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role *</label>
                                    <select class="form-control" id="role_id" name="role_id">
                                        <option value="">- Select roles -</option>
                                        <?php foreach ($roles as $key => $data) : ?>
                                            <option value="<?= $data->role_id ?>" <?= set_value('role_id') == $data->role_id ? 'selected' : ''; ?>>
                                                <?php if ($data->role_id ==  6) : ?>
                                                    Administrator
                                                <?php elseif ($data->role_id ==  7) : ?>
                                                    Operational
                                                <?php elseif ($data->role_id ==  8) : ?>
                                                    Client
                                                <?php endif ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Submit</button>
                                    <button type="reset" name="reset" class="btn btn-default"><i class="fas fa-sync-alt"></i> Reset</button>
                                </div>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->