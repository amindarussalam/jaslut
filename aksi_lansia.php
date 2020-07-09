<?php 

session_start();
include "koneksi.php";

if(!isset($_SESSION['login'])){
	header('location: login.php');
}

//jika ada get act
if(isset($_GET['act'])){
	//act insert
	if($_GET['act']=='insert'){
		//proses penyimpanan data
		//menyimpan kiriman form ke variabel
		$namalansia			= $_POST['namalansia'];
		$nik				= $_POST['nik'];
		$alamat		 		= $_POST['alamat'];
		$kelurahan	 		= $_POST['kelurahan'];
		$kecamatan	 		= $_POST['kecamatan'];
		$kabupaten			= $_POST['kabupaten'];
		$pendamping 		= $_POST['pendamping'];
		$tahap				= $_POST['tahap'];
		$ktp		 		= $_POST['ktp'];
		$kk		 			= $_POST['kk'];
		$rek1		 		= $_POST['rek1'];
		$rek2		 		= $_POST['rek2'];
		//memulai upload ktp
		$namaFile = $_FILES['ktp']['name'];
		$ukuranFile = $_FILES['ktp']['size'] > 500000;
		$error = $_FILES['ktp']['error'];
		$tmpName = $_FILES['ktp']['tmp_name'];

		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		$ktp = uniqid();
		$ktp .= '.';
		$ktp .= $ekstensiGambar;

		move_uploaded_file($tmpName,'berkas/' .$ktp);
		//selesai upload ktp

		//memulai upload kk
		$namaFile2 = $_FILES['kk']['name'];
		$ukuranFile2 = $_FILES['kk']['size'] > 500000;
		$error2 = $_FILES['kk']['error'];
		$tmpName2 = $_FILES['kk']['tmp_name'];

		$ekstensiGambarValid2 = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar2 = explode('.', $namaFile2);
		$ekstensiGambar2 = strtolower(end($ekstensiGambar2));

		$kk = uniqid();
		$kk .= '.';
		$kk .= $ekstensiGambar2;

		move_uploaded_file($tmpName2,'berkas/' .$kk);
		//selesai upload kk

		//memulai upload rek1
		$namaFile3 = $_FILES['rek1']['name'];
		$ukuranFile3 = $_FILES['rek1']['size'] > 500000;
		$error3 = $_FILES['rek1']['error'];
		$tmpName3 = $_FILES['rek1']['tmp_name'];

		$ekstensiGambarValid3 = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar3 = explode('.', $namaFile3);
		$ekstensiGambar3 = strtolower(end($ekstensiGambar3));

		$rek1 = uniqid();
		$rek1 .= '.';
		$rek1 .= $ekstensiGambar3;

		move_uploaded_file($tmpName3,'berkas/' .$rek1);
		//selesai upload rek1

		//memulai upload rek2
		$namaFile4 = $_FILES['rek2']['name'];
		$ukuranFile4 = $_FILES['rek2']['size'] > 500000;
		$error4 = $_FILES['rek2']['error'];
		$tmpName4 = $_FILES['rek2']['tmp_name'];

		$ekstensiGambarValid4 = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar4 = explode('.', $namaFile4);
		$ekstensiGambar4 = strtolower(end($ekstensiGambar4));

		$rek2 = uniqid();
		$rek2 .= '.';
		$rek2 .= $ekstensiGambar4;

		move_uploaded_file($tmpName4,'berkas/' .$rek2);
		//selesai upload rek2
		

		if($namalansia=='' || $nik=='' || $alamat=='' || $kelurahan=='' || $kecamatan=='' || $kabupaten=='' || $pendamping==''){
			header('location:data_lansia_spj.php?view=tambah&e=bl');
		}else{
			//proses query simpan data
			$simpan_data = mysqli_query($konek, "INSERT INTO lansia(nama_lansia,nik,alamat,kelurahan,kecamatan,kabupaten,tahap,pendamping,ktp,kk,rek_depan,rek_belakang) 
				VALUES ('$namalansia','$nik','$alamat','$kelurahan','$kecamatan','$kabupaten','$tahap','$pendamping','$ktp','$kk','$rek1','$rek2')");
			
			if($simpan_data){
				header('location:data_lansia_spj.php?e=sukses');
			}else{
				header('location:data_lansia_spj.php?e=gagal');				
	
			}
		}

	}
	//jika get update
	elseif($_GET['act']=='update'){
	// 	//menyimpan kiriman form ke variabel 
	$id					= $_POST['id'];
	$namalansia			= $_POST['nama_lansia'];
	$nik				= $_POST['nik'];
	$alamat		 		= $_POST['alamat'];
	$kelurahan	 		= $_POST['kelurahan'];
	$kecamatan	 		= $_POST['kecamatan'];
	$kabupaten			= $_POST['kabupaten'];
	$pendamping 		= $_POST['pendamping'];
	$tahap				= $_POST['tahap'];
	// $ktp		 		= $_POST['ktp'];
	// $kk		 		= $_POST['kk'];
	// $rek1		 	= $_POST['rek1'];
	// $rek2		 	= $_POST['rek2'];

		//memulai upload ktp
		$namaFile = $_FILES['ktp']['name'];
		$ukuranFile = $_FILES['ktp']['size'] > 500000;
		$error = $_FILES['ktp']['error'];
		$tmpName = $_FILES['ktp']['tmp_name'];

		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		$ktp = uniqid();
		$ktp .= '.';
		$ktp .= $ekstensiGambar;

		move_uploaded_file($tmpName,'berkas/' .$ktp);
		//selesai upload ktp

		//memulai upload kk
		$namaFile2 = $_FILES['kk']['name'];
		$ukuranFile2 = $_FILES['kk']['size'] > 500000;
		$error2 = $_FILES['kk']['error'];
		$tmpName2 = $_FILES['kk']['tmp_name'];

		$ekstensiGambarValid2 = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar2 = explode('.', $namaFile2);
		$ekstensiGambar2 = strtolower(end($ekstensiGambar2));

		$kk = uniqid();
		$kk .= '.';
		$kk .= $ekstensiGambar2;

		move_uploaded_file($tmpName2,'berkas/' .$kk);
		//selesai upload kk

		//memulai upload rek1
		$namaFile3 = $_FILES['rek1']['name'];
		$ukuranFile3 = $_FILES['rek1']['size'] > 500000;
		$error3 = $_FILES['rek1']['error'];
		$tmpName3 = $_FILES['rek1']['tmp_name'];

		$ekstensiGambarValid3 = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar3 = explode('.', $namaFile3);
		$ekstensiGambar3 = strtolower(end($ekstensiGambar3));

		$rek1 = uniqid();
		$rek1 .= '.';
		$rek1 .= $ekstensiGambar3;

		move_uploaded_file($tmpName3,'berkas/' .$rek1);
		//selesai upload rek1

		//memulai upload rek2
		$namaFile4 = $_FILES['rek2']['name'];
		$ukuranFile4 = $_FILES['rek2']['size'] > 500000;
		$error4 = $_FILES['rek2']['error'];
		$tmpName4 = $_FILES['rek2']['tmp_name'];

		$ekstensiGambarValid4 = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar4 = explode('.', $namaFile4);
		$ekstensiGambar4 = strtolower(end($ekstensiGambar4));

		$rek2 = uniqid();
		$rek2 .= '.';
		$rek2 .= $ekstensiGambar4;

		move_uploaded_file($tmpName4,'berkas/' .$rek2);
		//selesai upload rek2

		if($namalansia=='' || $nik=='' || $alamat=='' || $kelurahan=='' || $kecamatan=='' || $kabupaten=='' || $pendamping==''){
			header('location:data_lansia_spj.php?e=bl');
		}else{
		// 	if($_POST['nik']=='' || ){
		// 	$update = mysqli_query($konek, "UPDATE admin SET username='$username', 
		// 													namalengkap='$namalengkap'
		// 													WHERE idadmin='$idadmin'");

		// }else{
		// 	$update = mysqli_query($konek, "UPDATE admin SET username='$username', 
		// 													password='$password',
		// 													namalengkap='$namalengkap'
		// 													WHERE idadmin='$idadmin'");
		// }

			//proses query simpan data
			$edit_data = mysqli_query($konek, "UPDATE lansia SET 
															id='$id',
															nama_lansia='$namalansia',
															nik='$nik',
															alamat='$alamat',
															kelurahan='$kelurahan',
															kecamatan='$kecamatan',
															kabupaten='$kabupaten',
															tahap='$tahap',
															pendamping='$pendamping',
															ktp='$ktp',
															kk='$kk',
															rek_depan='$rek1',
															rek_belakang='$rek2'
															WHERE id='$id' ");

			
			if($edit_data){
				header('location:data_lansia_spj.php?e=sukses');
			}else{
				header('location:data_lansia_spj.php?e=gagal');				
	
			}
		}
		

	// 	if($nip=='' || $nama=='' || $jab=='' || $gol=='' || $status=='' || $anak==''){
	// 		header('location:data_pegawai.php?view=edit&e=bl');
	// 	}else{
	// 		//proses query update data
	// 		$update = mysqli_query($konek,"UPDATE pegawai SET 
	// 			nama_pegawai='$nama', 
	// 			kode_jabatan='$jab', 
	// 			kode_golongan='$gol', 
	// 			status='$status', 
	// 			jumlah_anak='$anak' 
	// 		WHERE nip='$nip' ");

	// 		if($update){
	// 			header('location:data_pegawai.php?e=sukses');
	// 		}else{
	// 			header('location:data_pegawai.php?e=gagal');
	// 		}
		

	} 
	// //jika act dengan del
	elseif($_GET['act'] == 'del') {
		$sqlunlink= mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM lansia WHERE id ='$_GET[id]'"));
		$ktp = $sqlunlink["ktp"];
		$kk = $sqlunlink['kk'];
		$rek1 = $sqlunlink['rek_depan'];
		$rek2 = $sqlunlink['rek_belakang'];
		unlink('berkas/'.$ktp);
		unlink('berkas/'.$kk);
		unlink('berkas/'.$rek1);
		unlink('berkas/'.$rek2);


		$hapus = mysqli_query($konek, "DELETE FROM lansia WHERE id ='$_GET[id]' ");
		
		if($hapus){
				header('location:data_lansia_spj.php?e=sukses');
			}else{
				header('location:data_lansia_spj.php?e=gagal');
			}
	}


}
	if($_GET['act'] == 'kosongkan'){

	$sqlkosongkan = mysqli_query($konek, "DELETE FROM data_lansia");
	if($sqlkosongkan){
				header('location:lansia.php?e=sukses');
			}else{
				header('location:lansia.php?e=gagal');
			}

}
// 	//memulai upload rek2
// 		$upload		 = $_POST['format'];
// 		$namaFile5   = $_FILES['format']['name'];
// 		$ukuranFile5 = $_FILES['format']['size'];
// 		$error5 	 = $_FILES['format']['error'];
// 		$tmpName5 	 = $_FILES['format']['tmp_name'];

// 		// $ekstensiGambarValid5= ['xlsx', 'xls'];
// 		$ekstensiGambar5 = explode('.', $namaFile5);
// 		$ekstensiGambar5 = strtolower(end($ekstensiGambar5));

// 		$file = uniqid();
// 		$file .= '.';
// 		$file .= $ekstensiGambar5;

// 		 $upload = move_uploaded_file($tmpName5,'file/' .$file);
// 		if($upload){
// 			header('location:lansia.php?e=sukses');
// 		} else {
// 			header('location:lansia.php?e=gagal');
// 		}
// 		// selesai upload rek2
// // 		echo "upload";

// }


 ?>