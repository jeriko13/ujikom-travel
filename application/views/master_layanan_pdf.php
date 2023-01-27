<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Master_layanan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Layanan</th>
		<th>Harga</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($master_layanan_data as $master_layanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $master_layanan->nama_layanan ?></td>
		      <td><?php echo $master_layanan->harga ?></td>
		      <td><?php echo $master_layanan->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>