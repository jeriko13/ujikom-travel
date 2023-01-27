<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>MASTER_LAYANAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Layanan <?php echo form_error('nama_layanan') ?></td>
            <td><input type="text" class="form-control" name="nama_layanan" id="nama_layanan" placeholder="Nama Layanan" value="<?php echo $nama_layanan; ?>" />
        </td>
	    <tr><td>Harga <?php echo form_error('harga') ?></td>
            <td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </td></tr>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('master_layanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->