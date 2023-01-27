
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Data_chartofaccount Read</h3>
        <table class="table table-bordered">
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td>Nama Akun</td><td><?php echo $nama_akun; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Saldo Awal</td><td><?php echo $saldo_awal; ?></td></tr>
	    <tr><td>Saldo</td><td><?php echo $saldo; ?></td></tr>
	    <tr><td>Saldo Akhir</td><td><?php echo $saldo_akhir; ?></td></tr>
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td>Phu</td><td><?php echo $phu; ?></td></tr>
	    <tr><td>Laporan Neraca</td><td><?php echo $laporan_neraca; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('chart') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->