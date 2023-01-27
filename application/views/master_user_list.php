<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>MASTER_USER LIST <?php echo anchor('master_user/create/', 'Create', array('class' => 'btn btn-info btn-sm')); ?>
            <?php echo anchor(site_url('master_user/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
            <?php echo anchor(site_url('master_user/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
            <?php echo anchor(site_url('master_user/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-danger btn-sm"'); ?></h3>
        </div><!-- /.box-header -->
        <div class='box-body'>
          <table class="table table-bordered table-striped" id="mytable">
            <thead>
              <tr>
                <th width="80px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $start = 0;
              foreach ($master_user_data as $master_user) {
              ?>
                <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $master_user->nama ?></td>
                  <td><?php echo $master_user->email ?></td>
                  <td><?php echo $master_user->password ?></td>
                  <td><?php echo $master_user->role ?></td>
                  <td style="text-align:center" width="140px">
                    <?php
                    echo anchor(site_url('master_user/read/' . $master_user->id), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-dark btn-sm'));
                    echo '  ';
                    echo anchor(site_url('master_user/update/' . $master_user->id), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-warning btn-sm'));
                    echo '  ';
                    echo anchor(site_url('master_user/delete/' . $master_user->id), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
          <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              $("#mytable").dataTable();
            });
          </script>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->