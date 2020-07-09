<?php 
  include "koneksi.php";
  $pdp_id = $_POST['pdp_id'];

  $sql_lansia =mysqli_query($konek, "SELECT * FROM data_lansia WHERE pendamping='$pdp_id'");

  echo '<option>- Pilih -</option>';
  $no=1;
  while($row_nik= mysqli_fetch_array($sql_lansia)){
    // echo '<option value="'.$row_lansia['nama_lansia'].'">'.$row_lansia['nama_lansia'].'</option>';
     echo "<option value='$row_nik[nik]'>$no. $row_nik[nik]</option>";
   $no++;
  }


 ?>