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
	li{
		text-align:justify;
		margin-left:-5px;

	}
	ol{
		padding-left:40px;
	}
	</style>
</head>
<body>
<p>PAKTA INTEGRITAS BANTUAN SOSIAL</P>
	Yang bertanda tangan dibawah ini:<br>
	Nama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : '.$d['nama_lansia'].'<br>
	No. KTP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : '.$d['nik'].'<br>
	Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;  : '.$d['alamat'].'<br>
	Jabatan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : Penerima Bantuan Sosial<br><br>
	
	Yang bertindak untuk dan atas nama '.$d['nama_lansia'].'<br>
	Dengan ini menyatakan dengan sebenarnya bahwa: 
	<ol>
 	<li>Saya   nama   '.$d['nama_lansia'].'  diusulkan  pada  Program  Keluarga Harapan  (PKH) Plus Jaminan  Sosial  Lanjut  Usia  yang  diajukan  kepada Gubernur Jawa Timur  untuk mendapatkan   bantuan  sosial sebesar Rp. 2.000.000,-  (Dua Juta  Rupiah) untuk 1 (satu) Tahun Anggaran.</li>
 	<li>  Bantuan Sosial disalurkan sebanyak 4 (empat) tahap masing-masing  :<br>
			- Tahap I	&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Rp.	500.000,-<br>
			- Tahap II	&emsp;&emsp;&emsp;&emsp;&nbsp;Rp.	500.000,-<br>
			- Tahap III	&emsp;&emsp;&emsp;&emsp;Rp.	500.000,-<br>
			- Tahap  IV	&emsp;&emsp;&emsp;&emsp;Rp.	500.000,-<br></li>
	<li>Bantuan   sosial   masing-masing tahap  dimanfaatkan   untuk  memenuhi  kebutuhan 	dasar hidup. </li>
	<li>
				Pakta integritas ini  berlaku sejak tanggal ditanda tangani, apabila dikemudian hari dilakukan pemeriksaan pihak internal maupun eksternal ditemukan penyalahgunaan pemanfaatan bantuan sosial dan berakibat merugikan Negara maka saya bertanggungjawab  secara  hukum  dan  mengembalikan  kerugian  Negara  sesuai dengan ketentuan peraturan Perundang-undangan yang berlaku.
	</li>

			</ol><br>
	<div class="p2">Lamongan,  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;      2020 <br>
	Penerima Bantuan Sosial<br><br><br></div>
	<div class="nama2">'.$d['nama_lansia'].'
	</div>


</body>
</html>

';

$mpdf->WriteHTML($html);
$mpdf->Output('PAKTA-INTEGRITAS.pdf', \Mpdf\Output\Destination::INLINE);

?>

