
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DATA_CHARTOFACCOUNT LIST <?php echo anchor('chart/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('chart/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('chart/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Kode</th>
		    <th>Nama Akun</th>
		    <th>Keterangan</th>
		    <th>Saldo Awal</th>
		    <th>Saldo</th>
		    <th>Saldo Akhir</th>
		    <th>Kategori</th>
		    <th>Phu</th>
		    <th>Laporan Neraca</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($chart_data as $chart)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $chart->kode ?></td>
		    <td><?php echo $chart->nama_akun ?></td>
		    <td><?php echo $chart->keterangan ?></td>
		    <td><?php echo $chart->saldo_awal ?></td>
		    <td><?php echo $chart->saldo ?></td>
		    <td><?php echo $chart->saldo_akhir ?></td>
		    <td><?php echo $chart->kategori ?></td>
		    <td><?php echo $chart->phu ?></td>
		    <td><?php echo $chart->laporan_neraca ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('chart/read/'.$chart->id_akun),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('chart/update/'.$chart->id_akun),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('chart/delete/'.$chart->id_akun),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->