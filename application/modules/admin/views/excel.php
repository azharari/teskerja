<html>
	<head>
	</head>
	<body>			
			
	<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Report.xls");//ganti nama sesuai keperluan
	header("Pragma: no-cache");
	header("Expires: 0");
	?> 			
		<h2> Laporan Data Mobil Hazard Car Rent </h2>
		<table border="1" style="padding:3px; margin:3px;">
			<tr>
				<td>No</td>
				<td>Id Mobil</td>
				<td>Nama Mobil</td>
				<td>No Polisi</td>
				<td>Harga Sewa</td>
				<td>Status</td>
				<td>Diinput Oleh</td>
				<td>Jabatan</td>
			</tr>
			<?php
			$no=1;
			foreach($hasil as $row)
			{
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->Id_Mobil ?></td>
				<td><?php echo $row->Nama_Mobil ?></td>
				<td><?php echo $row->No_Polisi ?></td>
				<td><?php echo $row->Harga ?></td>
				<td><?php echo $row->Status ?></td>
				<td><?php echo $row->Nama ?></td>
				<td><?php echo $row->Jabatan ?></td>
			</tr>
			<?php
			}
			?>
		</table>			
	
	</body>
</html>