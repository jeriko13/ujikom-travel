<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>TB_PEMESANAN LIST <?php echo anchor('tb_pemesanan/create/', 'Create', array('class' => 'btn btn-info btn-sm')); ?>
            <?php echo anchor(site_url('tb_pemesanan/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
            <?php echo anchor(site_url('tb_pemesanan/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
            <?php echo anchor(site_url('tb_pemesanan/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-danger btn-sm"'); ?></h3>
        </div><!-- /.box-header -->
        <div class='box-body'>
          <table class="table table-bordered table-striped" id="mytable">
            <thead>
              <tr>
                <th width="80px">No</th>
                <th>Id Layanan</th>
                <th>Id User</th>
                <th>Tanggal</th>
                <th>Jumlah Orang</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $start = 0;
              foreach ($tb_pemesanan_data as $tb_pemesanan) {
              ?>
                <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $tb_pemesanan->id_layanan ?></td>
                  <td><?php echo $tb_pemesanan->id_user ?></td>
                  <td><?php echo $tb_pemesanan->tanggal ?></td>
                  <td><?php echo $tb_pemesanan->jumlah_orang ?></td>
                  <td><?php echo $tb_pemesanan->status ?></td>
                  <td style="text-align:center" width="140px">
                    <?php
                    echo anchor(site_url('tb_pemesanan/read/' . $tb_pemesanan->id), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-dark btn-sm'));
                    echo '  ';
                    echo anchor(site_url('tb_pemesanan/update/' . $tb_pemesanan->id), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-warning btn-sm'));
                    echo '  ';
                    echo anchor(site_url('tb_pemesanan/delete/' . $tb_pemesanan->id), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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