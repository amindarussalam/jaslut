<?php 
  include "koneksi.php";
  $pdp_id = $_POST['pdp_id'];

  $sql_alamat =mysqli_query($konek, "SELECT * FROM data_lansia WHERE pendamping='$pdp_id'");

  echo '<option>- Pilih -</option>';
  $no=1;
  while($row_alamat= mysqli_fetch_array($sql_alamat)){
  	// echo '<option value="'.$row_lansia['nama_lansia'].'">'.$row_lansia['nama_lansia'].'</option>';
  	 echo "<option value='$row_alamat[alamat]'>$no. $row_alamat[alamat]</option>";
   $no++;
  }


 ?>