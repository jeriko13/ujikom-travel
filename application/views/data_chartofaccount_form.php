<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA_CHARTOFACCOUNT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kode <?php echo form_error('kode') ?></td>
            <td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </td>
	    <tr><td>Nama Akun <?php echo form_error('nama_akun') ?></td>
            <td><input type="text" class="form-control" name="nama_akun" id="nama_akun" placeholder="Nama Akun" value="<?php echo $nama_akun; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
	    <tr><td>Saldo Awal <?php echo form_error('saldo_awal') ?></td>
            <td><input type="text" class="form-control" name="saldo_awal" id="saldo_awal" placeholder="Saldo Awal" value="<?php echo $saldo_awal; ?>" />
        </td>
	    <tr><td>Saldo <?php echo form_error('saldo') ?></td>
            <td><input type="text" class="form-control" name="saldo" id="saldo" placeholder="Saldo" value="<?php echo $saldo; ?>" />
        </td>
	    <tr><td>Saldo Akhir <?php echo form_error('saldo_akhir') ?></td>
            <td><input type="text" class="form-control" name="saldo_akhir" id="saldo_akhir" placeholder="Saldo Akhir" value="<?php echo $saldo_akhir; ?>" />
        </td>
	    <tr><td>Kategori <?php echo form_error('kategori') ?></td>
            <td><input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
        </td>
	    <tr><td>Phu <?php echo form_error('phu') ?></td>
            <td><input type="text" class="form-control" name="phu" id="phu" placeholder="Phu" value="<?php echo $phu; ?>" />
        </td>
	    <tr><td>Laporan Neraca <?php echo form_error('laporan_neraca') ?></td>
            <td><input type="text" class="form-control" name="laporan_neraca" id="laporan_neraca" placeholder="Laporan Neraca" value="<?php echo $laporan_neraca; ?>" />
        </td>
	    <input type="hidden" name="id_akun" value="<?php echo $id_akun; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('chart') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->