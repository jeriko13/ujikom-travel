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
        <h2>Tb_kendaraan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis</th>
		<th>Merk</th>
		<th>Plat Nomor</th>
		<th>Jumlah Kursi</th>
		<th>Harga Sewa</th>
		
            </tr><?php
            foreach ($tb_kendaraan_data as $tb_kendaraan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_kendaraan->jenis ?></td>
		      <td><?php echo $tb_kendaraan->merk ?></td>
		      <td><?php echo $tb_kendaraan->plat_nomor ?></td>
		      <td><?php echo $tb_kendaraan->jumlah_kursi ?></td>
		      <td><?php echo $tb_kendaraan->harga_sewa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>