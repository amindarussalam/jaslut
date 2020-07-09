<?php
include('koneksi.php');
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $nik = $sheetData[$i]['1'];
        $namalansia = $sheetData[$i]['2'];
        $tempatlahir = $sheetData[$i]['3'];
        $tanggallahir = $sheetData[$i]['4'];
        $ibukandung = $sheetData[$i]['5'];
        $alamat = $sheetData[$i]['6'];
        $norek = $sheetData[$i]['7'];
        $status = $sheetData[$i]['8'];
        $kabupaten = $sheetData[$i]['9'];
        $kecamatan = $sheetData[$i]['10'];
        $kelurahan = $sheetData[$i]['11'];
        $pendamping = $sheetData[$i]['12'];
        mysqli_query($konek, "INSERT INTO data_lansia(id,nik,nama_lansia,tempat_lahir,tanggal_lahir,ibu_kandung,alamat,no_rek,status_lansia,kabupaten,kecamatan,kelurahan,pendamping) 
				VALUES ('','$nik','$namalansia','$tempatlahir','$tanggallahir','$ibukandung','$alamat','$norek','$status','$kabupaten','$kecamatan','$kelurahan','$pendamping')");
    }
    header("location:lansia.php?e=sukses"); 
}
?>