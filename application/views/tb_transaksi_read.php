
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Tb_transaksi Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Pemesanan</td><td><?php echo $id_pemesanan; ?></td></tr>
	    <tr><td>Id Kendaraan</td><td><?php echo $id_kendaraan; ?></td></tr>
	    <tr><td>Total Harga</td><td><?php echo $total_harga; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tb_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->