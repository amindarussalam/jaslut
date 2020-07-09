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
                        Buat SPJ KPM Jaslut
                        </h3>
                    </div>
                    <div class="panel-body">

                    <a href="data_lansia_spj.php?view=tambah" class="btn btn-success" style="margin-bottom:20px;">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data </a>
                    <!-- <a href="data_golongan.php?view=tambah" class="btn btn-primary" style="margin-bottom:10px;">Tambah Data</a> -->
                        <table class="table table-bordered table-striped" id="datatables">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lansia</th>
                                <th>Tahap</th>
                                <th>Pendamping</th>
                                <th width="40%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $sql = mysqli_query($konek,"SELECT * FROM lansia ORDER BY pendamping ASC");
                            $no =1;

                            while($d=mysqli_fetch_array($sql)){
                                echo "<tr>
                                    <td width='40px' align='center'>$no</td>
                                    <td>$d[nama_lansia]</td>
                                    <td>$d[tahap]</td>
                                    <td>$d[pendamping]</td>
                                    <td width='280px' align='center'>
                                        <a class='btn btn-warning btn-sm' href='data_lansia_spj.php?view=edit&id=$d[id]'> <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Edit</a>
                                        <a class='btn btn-danger btn-sm'  href='aksi_lansia.php?act=del&id=$d[id]'> <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Delete</a>
                                        <a class='btn btn-success btn-sm' href='cetak.php?act=cetak&id=$d[id]' target='_blank'> <span class='glyphicon glyphicon-print' aria-hidden='true'></span> Laporan</a>
                                        <a class='btn btn-success btn-sm' href='pakta.php?act=pakta&id=$d[id]' target='_blank'> <span class='glyphicon glyphicon-print' aria-hidden='true'></span> Pakta</a>
                                        <a class='btn btn-success btn-sm' href='pernyataan.php?act=pernyataan&id=$d[id]' target='_blank'> <span class='glyphicon glyphicon-print' aria-hidden='true'></span> Pernyataan</a>
                                   </td>
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
        <?php

    break ;
    case "tambah":
          
        ?>
               
            <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        Tambah SPJ KPM Jaslut
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="aksi_lansia.php?act=insert" enctype="multipart/form-data">
                            <table class="table">
                                <tr>
                                    <td>Nama Pendamping</td>
                                    <td>
                                    <select  class="form-control" name="pendamping" id="pendamping">
                                        <option value="">- Pilih -</option>
                                        <?php 
                                            $sqllansia1=mysqli_query($konek, "SELECT * FROM data_lansia GROUP BY pendamping");
                                            while($p=mysqli_fetch_array($sqllansia1)){
                                                echo "<option value='$p[pendamping]'>$p[pendamping]</option>";
                                            }
                                         ?>
                                        
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Lansia</td>
                                    <td>
                                    <select class="form-control" name="namalansia" id="nama_lansia">
                                        <option value="">- Pilih -</option>
                                        <option></option>
                                                                                
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>
                                    <select class="form-control" name="nik" id="nik">
                                        <option value="">- Pilih -</option>
                                        <option></option>
                                                                                
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                    <select  class="form-control" name="alamat" id="alamat_lansia">
                                        <option value="">- Pilih -</option>
                                        <option></option>
                                                                                
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>
                                    <select class="form-control" name="kelurahan" id="kelurahan">
                                        <option value="">- Pilih -</option>
                                        <option></option>
                                                                                
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                     <td>
                                    <select  class="form-control" name="kecamatan" id="kecamatan">
                                        <option value="">- Pilih -</option>
                                        <option></option>
                                                                                
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td>
                                    <select class="form-control" name="kabupaten" id="kabupaten">
                                        <option value="">- Pilih -</option>
                                        <?php 
                                            $sqllansia2=mysqli_query($konek, "SELECT * FROM data_lansia GROUP BY kabupaten");
                                            while($kab=mysqli_fetch_array($sqllansia2)){
                                                echo "<option value='$kab[kabupaten]'>$kab[kabupaten]</option>";
                                            }
                                         ?>
                                        
                                    </select>

                                    </td>
                                </tr>
                                 <tr>
                                    <td>Tahap Pencairan</td>
                                    <td>
                                    <select class="form-control" name="tahap" id="tahap">
                                        <option value="">- Pilih -</option>
                                        <option value="1">Tahap 1</option>
                                        <option value="2">Tahap 2</option>
                                        <option value="3">Tahap 3</option>
                                        <option value="4">Tahap 4</option>
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload KTP</td>
                                    <td>
                                    <input class="form-control" type="file" name="ktp"  required>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Upload KK</td>
                                    <td>
                                    <input class="form-control" type="file" name="kk" required>
                                    </td>
                                </tr>    
                                <tr>
                                    <td>Upload Rekening Depan</td>
                                    <td>
                                    <input class="form-control" type="file" name="rek1" required>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Upload Rekening Belakang</td>
                                    <td>
                                    <input class="form-control" type="file" name="rek2" required>
                                    </td>
                                </tr> 
                                <tr>
                                    <td></td>
                                    <td>
                                     <input class="btn btn-primary" type="submit" value="simpan"> 
                                     <a class="btn btn-danger" href="data_lansia_spj.php">Kembali</a>
                                    </td>
                                </tr>                                         
                                                                 
                            </table>
                        </form>
                </div>

            </div>
      </div>
    </div>
    <br>
            <br>
            <br>
            <br>

        <?php  

    break ;
    case "edit":
        $editlansia=mysqli_query($konek, "SELECT * FROM lansia WHERE id='$_GET[id]' ");
        $p=mysqli_fetch_array($editlansia);
     ?> 
        
          <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        Edit SPJ Jaslut
                        </h3>
                    </div> 
                         <div class="panel-body">
                        <form method="post" action="aksi_lansia.php?act=update" enctype="multipart/form-data">
                           
                               <table class="table">
                                <tr>
                                    <td>Nama Pendamping</td>
                                    <td> 
                                    <input type="hidden" name="id" value="<?php echo $p['id']; ?>">                                         
                                    <input class="form-control" name="pendamping" type="text" value="<?php echo $p['pendamping']; ?>" readonly> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Lansia</td>
                                    <td>
                                    <input class="form-control" name="nama_lansia" type="text" value="<?php echo $p['nama_lansia']; ?>" readonly> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>
                                    <input class="form-control" name="nik" type="text" value="<?php echo $p['nik']; ?>" readonly>             
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                    <input class="form-control" name="alamat" type="text" value="<?php echo $p['alamat']; ?>" readonly> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>
                                    <input class="form-control" name="kelurahan" type="text" value="<?php echo $p['kelurahan']; ?>" readonly> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                     <td>
                                     <input class="form-control" name="kecamatan" type="text" value="<?php echo $p['kecamatan']; ?>" readonly>                         
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td>
                                    <input class="form-control" name="kabupaten" type="text" value="<?php echo $p['kabupaten']; ?>" readonly> 
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Tahap</td>
                                    <td>
                                    <input class="form-control" name="tahap" type="text" value="<?php echo $p['tahap']; ?>" required> 
                                    </td>   
                                </tr>
                                <tr>
                                    <td>Upload KTP</td>
                                    <td>
                                    <div class="row"><img src="berkas/<?php echo $p['ktp']; ?>" width="200px"></div><br>
                                    <input class="form-control" type="file" name="ktp" required>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Upload KK</td>
                                    <td>
                                    <div class="row"><img src="berkas/<?php echo $p['kk']; ?>" width="200px"></div><br>
                                    <input class="form-control" type="file" name="kk" required>
                                    </td>
                                </tr>    
                                <tr>
                                    <td>Upload Rekening Depan</td>
                                    <td>
                                    <div class="row"><img src="berkas/<?php echo $p['rek_depan']; ?>" width="200px"></div><br>
                                    <input class="form-control" type="file" name="rek1" required>
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Upload Rekening Belakang</td>
                                    <td>
                                    <div class="row"><img src="berkas/<?php echo $p['rek_belakang']; ?>" width="200px"></div><br>
                                    <input class="form-control" type="file" name="rek2"  required>
                                    </td>
                                </tr> 
                                <tr>
                                    <td></td>
                                    <td>
                                     <input class="btn btn-primary" type="submit" value="simpan"> 
                                     <a class="btn btn-danger" href="data_lansia_spj.php">Kembali</a>
                                    </td>
                                </tr>                                         
                                                                 
                            </table>
                        </form>
                </div>

            </div>
      </div>
    </div>
    <br>
            <br>
            <br>
            <br>

<?php
    break;

}

 ?>
 </div>




<?php include "footer.php"; ?>