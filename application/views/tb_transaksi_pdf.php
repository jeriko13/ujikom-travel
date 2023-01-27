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
        <h2>Tb_transaksi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pemesanan</th>
		<th>Id Kendaraan</th>
		<th>Total Harga</th>
		<th>Tanggal</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($tb_transaksi_data as $tb_transaksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_transaksi->id_pemesanan ?></td>
		      <td><?php echo $tb_transaksi->id_kendaraan ?></td>
		      <td><?php echo $tb_transaksi->total_harga ?></td>
		      <td><?php echo $tb_transaksi->tanggal ?></td>
		      <td><?php echo $tb_transaksi->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>