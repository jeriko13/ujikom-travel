
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Tb_kendaraan Read</h3>
        <table class="table table-bordered">
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Merk</td><td><?php echo $merk; ?></td></tr>
	    <tr><td>Plat Nomor</td><td><?php echo $plat_nomor; ?></td></tr>
	    <tr><td>Jumlah Kursi</td><td><?php echo $jumlah_kursi; ?></td></tr>
	    <tr><td>Harga Sewa</td><td><?php echo $harga_sewa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tb_kendaraan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->