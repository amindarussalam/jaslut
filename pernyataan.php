<?php
	include "koneksi.php";
	$cetak = $_GET['ac'] == 'pernyataan';
	
	$sql = mysqli_query($konek,"SELECT * FROM lansia WHERE id = '$_GET[id]'");
	$d = mysqli_fetch_array($sql);


require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330]]);
$html = '
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body{
		font-family: arial;
		font-size: 16px;
		line-height:30px;
		text-align:justify;
	}
	p {
		font-size:20;
		text-align:center;
		font-weight: bold;
	}
	.p2 {
		text-align:center;
		margin-left:345px;
	}
	.nama2{
		text-align:center;
		margin-left:345px;
		font-weight: bold;
	}
	</style>
</head>
<body>
<p>SURAT PERNYATAAN TANGGUNG JAWAB PENGGUNAAN<br>
	BANTUAN SOSIAL BERUPA UANG</P>
	Yang bertanda tangan dibawah ini:<br>
	Nama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : '.$d['nama_lansia'].'<br>
	No. KTP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : '.$d['nik'].'<br>
	Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;  : '.$d['alamat'].'<br>
	Jabatan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : Penerima Bantuan Sosial<br><br>
	
	Yang bertindak untuk dan atas nama '.$d['nama_lansia'].'<br>
 	Menyatakan bertanggung jawab secara formal dan 
	material atas penggunaan dana bantuan sosial berupa uang yang telah diterima dan membuktikan penggunaan dan tersebut
	sesuai dengan peruntukannya. <br>
	apabila dikemudian hari dilakukan pemeriksaan pihak internal maupun external ditemukan penyalahgunaan 
	pemanfaatan bantuan sosial dan berakibat merugikan negara maka kami bertanggung jawab secara hukum dan mengembalikan
	kerugian negara sesuai dengan ketentuan peraturan perundang-undangan yang berlaku.<br><br>
	Demikian surat pernyataan ini dibuat dengan sebenarnya.<br><br>
	<div class="p2">Lamongan,  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  2020 <br>
	Penerima Bantuan Sosial<br><br><br></div>
	<div class="nama2">'.$d['nama_lansia'].'
	</div>


</body>
</html>

';

$mpdf->WriteHTML($html);
$mpdf->Output('SURAT-PERNYATAAN.pdf', \Mpdf\Output\Destination::INLINE);

?>

