<?php 
  include "koneksi.php";
  $pdp_id = $_POST['pdp_id'];

  $sql_kec =mysqli_query($konek, "SELECT * FROM data_lansia WHERE pendamping='$pdp_id' GROUP BY kecamatan");

  echo '<option>- Pilih -</option>';
  $no=1;
  while($row_kec= mysqli_fetch_array($sql_kec)){
  	// echo '<option value="'.$row_lansia['nama_lansia'].'">'.$row_lansia['nama_lansia'].'</option>';
  	 echo "<option value='$row_kec[kecamatan]'>$no. $row_kec[kecamatan]</option>";
   $no++;
  }


 ?>