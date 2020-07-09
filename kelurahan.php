<?php 
  include "koneksi.php";
  $pdp_id = $_POST['pdp_id'];

  $sql_kel =mysqli_query($konek, "SELECT * FROM data_lansia WHERE pendamping='$pdp_id'");

  echo '<option>- Pilih -</option>';
  $no=1;
  while($row_kel= mysqli_fetch_array($sql_kel)){
  	// echo '<option value="'.$row_lansia['nama_lansia'].'">'.$row_lansia['nama_lansia'].'</option>';
  	 echo "<option value='$row_kel[kelurahan]'>$no. $row_kel[kelurahan]</option>";
   $no++;
  }


 ?>