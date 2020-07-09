<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Halaman Login </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style >
    html{
      position: relative;
      min-height: 100%;
    }
    body{
      background:url(assets/img/symphony.png);
 
    
    }
    body > .container{
      margin-top: 70px;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login Aplikasi SPJ Jaslut Jatim </h3>            
          </div>  
          <div class="panel-body">
          <!-- <center>
            <img src="assets/img/ppht2.png" class="img-circle" alt="logo" width="90px">
          </center> -->
          <hr>
          <?php 
            if($_SERVER['REQUEST_METHOD']=='POST'){
              $user = $_POST['username'];
              $pass = $_POST['password'];
              $p = md5($pass);

              if($user =='' || $pass==''){
                ?>
                <div alert class="alert alert-warning"><b>Warning</b> Form Anda Belum Lengkap</div>
                <?php    
              }else{
                include "koneksi.php";
                $sqllogin = mysqli_query($konek,"SELECT * FROM admin WHERE username='$user' AND password='$p'");
                $jml = mysqli_num_rows($sqllogin);
                $d = mysqli_fetch_array($sqllogin);

                if($jml > 0){
                  session_start();
                  $_SESSION['login']          = TRUE;
                  $_SESSION['id']             = $d['idadmin'];
                  $_SESSION['username']       = $d['username'];
                  $_SESSION['namalengkap']    = $d['namalengkap'];

                  header('location:./index.php');
                }else{
                  ?>
                  <div class="alert alert-danger"><b>ERROR</b> Username dan Password Salah</div>

                  <?php 
                }
                
              }
            }

           ?>

            <form action="" method="POST" role="form">
              <div class="form-group">
                <input type="text" class="form-control" name="username"  placeholder="Username"></input>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password"  placeholder="Password"></input>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login"></input>
              </div>
            </form>

          </div>        
        </div>      
    </div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>