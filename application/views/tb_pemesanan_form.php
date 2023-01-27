<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TB_PEMESANAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Layanan <?php echo form_error('id_layanan') ?></td>
            <td><input type="text" class="form-control" name="id_layanan" id="id_layanan" placeholder="Id Layanan" value="<?php echo $id_layanan; ?>" />
        </td>
	    <tr><td>Id User <?php echo form_error('id_user') ?></td>
            <td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </td>
	    <tr><td>Tanggal <?php echo form_error('tanggal') ?></td>
            <td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </td>
	    <tr><td>Jumlah Orang <?php echo form_error('jumlah_orang') ?></td>
            <td><input type="text" class="form-control" name="jumlah_orang" id="jumlah_orang" placeholder="Jumlah Orang" value="<?php echo $jumlah_orang; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->