<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TB_TRANSAKSI</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Pemesanan <?php echo form_error('id_pemesanan') ?></td>
            <td><input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php echo $id_pemesanan; ?>" />
        </td>
	    <tr><td>Id Kendaraan <?php echo form_error('id_kendaraan') ?></td>
            <td><input type="text" class="form-control" name="id_kendaraan" id="id_kendaraan" placeholder="Id Kendaraan" value="<?php echo $id_kendaraan; ?>" />
        </td>
	    <tr><td>Total Harga <?php echo form_error('total_harga') ?></td>
            <td><input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" value="<?php echo $total_harga; ?>" />
        </td>
	    <tr><td>Tanggal <?php echo form_error('tanggal') ?></td>
            <td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->