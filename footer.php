    <footer class="footer" >
          <div class="container">
        <p class="text-muted">Created By: aminSoft &copy 2020   </p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <!-- awal tabel data lansia-->
    <script type="text/javascript">
    
        $(document).ready( function () {
            $('#datatables').DataTable();
        } );

    </script>
    <!-- akhir tabel data lansia -->
    <!-- list nama lansia -->
    <script type="text/javascript">
    
        $(document).ready( function () {
            $('#pendamping').change(function() {
                var pendamping_id= $(this).val();

                $.ajax({
                  type: 'POST', //method
                  url: 'nama_lansia.php', //action
                  data: 'pdp_id='+pendamping_id, //action post [pdp_id]
                  success: function(response) {
                    $('#nama_lansia').html(response);
                  }

                });

            })
        } );

    </script>
    <!-- akhir list nama lansia -->
        <!-- list nama nik -->
    <script type="text/javascript">
    
        $(document).ready( function () {
            $('#pendamping').change(function() {
                var pendamping_id= $(this).val();

                $.ajax({
                  type: 'POST', //method
                  url: 'nik_lansia.php', //action
                  data: 'pdp_id='+pendamping_id, //action post [pdp_id]
                  success: function(response) {
                    $('#nik').html(response);
                  }

                });

            })
        } );

    </script>
    <!-- akhir list nama nik -->
    <!-- awal list alamat -->
    <script type="text/javascript">
    
        $(document).ready( function () {
            $('#pendamping').change(function() {
                var pendamping_id= $(this).val();

                $.ajax({
                  type: 'POST', //method
                  url: 'alamat_lansia.php', //action
                  data: 'pdp_id='+pendamping_id, //action post [pdp_id]
                  success: function(response) {
                    $('#alamat_lansia').html(response);
                  }

                });

            })
        } );

    </script>
    <!-- akhir list alamat -->
    <!-- awal list kelurahan -->
    <script type="text/javascript">
    
        $(document).ready( function () {
            $('#pendamping').change(function() {
                var pendamping_id= $(this).val();

                $.ajax({
                  type: 'POST', //method
                  url: 'kelurahan.php', //action
                  data: 'pdp_id='+pendamping_id, //action post [pdp_id]
                  success: function(response) {
                    $('#kelurahan').html(response);
                  }

                });

            })
        } );

    </script>
    <!-- akhir list kelurahan -->
     <!-- awal list kecamatan -->
    <script type="text/javascript">
    
        $(document).ready( function () {
            $('#pendamping').change(function() {
                var pendamping_id= $(this).val();

                $.ajax({
                  type: 'POST', //method
                  url: 'kecamatan.php', //action
                  data: 'pdp_id='+pendamping_id, //action post [pdp_id]
                  success: function(response) {
                    $('#kecamatan').html(response);
                  }

                });

            })
        } );

    </script>
    <!-- akhir list kecamatan -->
  </body>
</html>