<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TB_KENDARAAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Jenis <?php echo form_error('jenis') ?></td>
            <td><input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
        </td>
	    <tr><td>Merk <?php echo form_error('merk') ?></td>
            <td><input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" />
        </td>
	    <tr><td>Plat Nomor <?php echo form_error('plat_nomor') ?></td>
            <td><input type="text" class="form-control" name="plat_nomor" id="plat_nomor" placeholder="Plat Nomor" value="<?php echo $plat_nomor; ?>" />
        </td>
	    <tr><td>Jumlah Kursi <?php echo form_error('jumlah_kursi') ?></td>
            <td><input type="text" class="form-control" name="jumlah_kursi" id="jumlah_kursi" placeholder="Jumlah Kursi" value="<?php echo $jumlah_kursi; ?>" />
        </td>
	    <tr><td>Harga Sewa <?php echo form_error('harga_sewa') ?></td>
            <td><input type="text" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Harga Sewa" value="<?php echo $harga_sewa; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_kendaraan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->