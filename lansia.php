<?php include "header.php"; ?>
<div class="container">

<?php 

$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view) {
    default:
        ?>
         <!--menampilkan pesan-->
        <?php 
        if(isset($_GET['e']) && $_GET['e']=='sukses'){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Selamat!</strong> Proses Berhasil.
        </div>
        <?php
        }elseif(isset($_GET['e']) && $_GET['e']=='gagal'){
            ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Mohon Maaf!</strong> Proses Gagal.
        </div>

            <?php

        }

         ?>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        Data Lansia
                        </h3>
                    </div>
                    <div class="panel-body">
                    <div class="alert alert-info"><strong>Data KPM Jaslut Jatim terbaru ...!</strong></div>
                    <!-- <a href="data_golongan.php?view=tambah" class="btn btn-primary" style="margin-bottom:10px;">Tambah Data</a> -->
                    <a href="./data/format/FORMAT.xlsx" class="btn btn-default btn-xm"><span class='glyphicon glyphicon-download' aria-hidden='true'></span> Download Format Excel</a>
                    <a href="aksi_lansia.php?act=kosongkan" onclick="return confirm('Anda Akan Mengosongkan Database?')"class="btn btn-danger btn-xm"><span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>  Kosongkan Database</a>
                    <a href="lansia.php?view=upload" class="btn btn-success btn-xm"><span class='glyphicon glyphicon-upload' aria-hidden='true'></span> Upload Data</a> <br><br>
                        <table class="table table-bordered table-striped" id="datatables">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>N I K</th>
                                <th>Nama Lansia</th>
                                <th>Pendamping</th>
                                <th>Alamat</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $sql = mysqli_query($konek,"SELECT * FROM data_lansia ORDER BY pendamping ASC");
                            $no =1;

                            while($d=mysqli_fetch_array($sql)){
                                echo "<tr>
                                    <td width='40px' align='center'>$no</td>
                                    <td>$d[nik]</td>
                                    <td width='175px'>$d[nama_lansia]</td>
                                    <td width='250px'>$d[pendamping]</td>
                                    <td>$d[alamat]</td>
                                    <td>$d[status_lansia]</td>
                                    
                                </tr>";
                                $no++;
                                 }
                             ?>   
                             </tbody>                        
                        </table>
                        <br>
                      
                    </div>

                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
           
        <?php
    break ;
    case "upload":
        //buat kode uload excel
        ?>
       <div class="row">
           <div class="panel panel-primary">
               <div class="panel-heading">
                   <h3 class="panel-title">Upload Data Excel</h3>
               </div>
               <div class="panel-body">
                        
                 <form method="post" action="proses_upload.php" enctype="multipart/form-data">
                 <table class="table">

                 <tr>
                    <td>Upload Format Excel</td>
                    <td>
                    <input class="form-control" type="file" name="berkas_excel" required>
                    </td>
                 </tr>
                 <tr>
                    <td></td>
                    <td>
                    <input class="btn btn-primary" type="submit" value="Upload"> 
                    <a class="btn btn-danger" href="lansia.php">Kembali</a>
                    </td>
                </tr>                                               
                 </table>
                 </form>
               </div>
           </div>
       </div>        

            
        <?php  

    break ; 
    case "edit":
        $sqledit = mysqli_query($konek, "SELECT * FROM golongan WHERE kode_golongan ='$_GET[id]' ");
        $e = mysqli_fetch_array($sqledit);
        ?>
               
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Data Golongan</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="aksi_golongan.php?act=update">
                        <table class="table">
                            <tr>
                                <td width="160">Kode Golongan</td>
                                <td>
                                    <input type="text" name="kodegolongan" class="form-control" value="<?php echo $e['kode_golongan']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td width="160">Nama Golongan</td>
                                <td>
                                    <input type="text" name="namagolongan" class="form-control" value="<?php echo $e['nama_golongan']; ?> " required/>
                                </td>
                            </tr>
                            <tr>
                                <td width="160">Tunjangan S/I</td>
                                <td>
                                    <input type="text" name="tunjangansi" class="form-control" value="<?php echo $e['tunjangan_suami_istri']; ?> " required/>
                                </td>
                            </tr>
                             <tr>
                                <td width="160">Tunjangan Anak</td>
                                <td>
                                    <input type="text" name="tunjangananak" class="form-control" value="<?php echo $e['tunjangan_anak']; ?>" required/>
                                </td>
                            </tr>
                             <tr>
                                <td width="160">Uang Makan</td>
                                <td>
                                    <input type="text" name="uangmakan" class="form-control" value="<?php echo $e['uang_makan']; ?>" required/>
                                </td>
                            </tr>
                             <tr>
                                <td width="160">Uang Lembur</td>
                                <td>
                                    <input type="text" name="uanglembur" class="form-control" value="<?php echo $e['uang_lembur']; ?>" required/>
                                </td>
                            </tr>
                             <tr>
                                <td width="160">Askes</td>
                                <td>
                                    <input type="text" name="askes" class="form-control" value="<?php echo $e['akses']; ?>" required/>
                                </td>
                            </tr>
                            <tr>
                                <td ></td>
                                <td>
                                    <input type="Submit" class="btn btn-primary" value="Update" >
                                    <a href="data_golongan.php" class="btn btn-danger">Kembali</a> 
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <?php

    break;

}

 ?>
 </div>
  <?php include "footer.php"; ?>

