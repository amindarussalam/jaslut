<?php
	include "koneksi.php";
	$cetak = $_GET['ac'] == 'cetak';
	
	$sql = mysqli_query($konek,"SELECT * FROM lansia WHERE id = '$_GET[id]'");
	$d = mysqli_fetch_array($sql);


require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330]]);
$html = '
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0" fontsize="11" style="font-family:arial">
<tr>
<td width="400px" height="250px" align="left">
NAMA  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: '.$d['nama_lansia'].' <br><br>
ALAMAT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	: '.$d['alamat'].' <br><br>
DESA  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '.$d['kelurahan'].' <br><br>
KECAMATAN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '.$d['kecamatan'].' <br><br>
KABUPATEN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '.$d['kabupaten'].' <br><br>
PENDAMPING  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '.$d['pendamping'].' <br><br>
</td>
<td width="400px" align="center"><img src="berkas/'.$d['ktp'].'" width="350px" height="250px"></td>
</tr>
<tr>
<td colspan="2" height="450px" align="center"><img src="berkas/'.$d['kk'].'" width="640px" height="380px"></td>
</tr>
<tr>
<td height="540px"><img src="berkas/'.$d['rek_depan'].'" width="375px" height="445px"></td>
<td height="540px"><img src="berkas/'.$d['rek_belakang'].'" width="375px" height="445px"></td>
</tr>
</table>

</body>
</html>

';

$mpdf->WriteHTML($html);
$mpdf->Output('SPJ-JASLUT.pdf', \Mpdf\Output\Destination::INLINE);

?>

