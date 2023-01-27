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
        <h2>Data_chartofaccount List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama Akun</th>
		<th>Keterangan</th>
		<th>Saldo Awal</th>
		<th>Saldo</th>
		<th>Saldo Akhir</th>
		<th>Kategori</th>
		<th>Phu</th>
		<th>Laporan Neraca</th>
		
            </tr><?php
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>