<div class="form-group">
      
     </div>
 
	 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA PASIEN</li>
      </ol>
        <center><h2><i class="fa fa-users"></i>Data Pasien</h2></center>
      <hr>
         <div class="card mb-3">
        <div class="card-header">
            <p><strong>Filter Berdasarkan</strong></p>
            <div class="row">
              <div class="col-md-8">
                Tanggal Daftar
              </div>
              <div class="col-md-4">
                Pengguna Askes
              </div>
            </div>
            <br/>
            <form action="cetak_data_pasien.php" method="POST" target="_BLANK">
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-2">
                    Dari Tanggal
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="dari" class="form-control" name="dari" value=""required>
                  </div>
                  <div class="col-md-2">
                    Sampai
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="sampai" class="form-control" name="sampai" value=""required>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <select name="fill_askes" id="fill_askes" class="form-control" required>
                  <option value="0">-- Pilih --</option>
                  <option value="1">Askes</option>
                  <option value="2">Tidak</option>
                </select>
              </div>
            </div>
            <input type="submit" value="Cetak">
            </form>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_pasien" width="100%">
              <thead>
                          <tr>
            <th><center>No</center></th>
            <th><center>NIP</center></th>
            <th><center>Nama</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th><center>Tgl. Lahir</center></th>
            <th><center>No. Askes</center></th>
            <th><center>Unit Kerja</center></th>
            <th><center>Telepon</center></th>
            <th><center>Alamat</center></th>
            <th><center>Tanggal Terdaftar</center></th>
            </tr>
        </thead>
         
    </table>

    
    <script>
    $(document).ready(function (){
      fill_datatable();

      function fill_datatable(fill_askes, dari, sampai){
        var datatable = $('#table_pasien').DataTable({
          "processing" : true,
          "serverSide" : true,
          "order" : [],
          "searcing" : false,
          "sDom" : 'p',
          "ajax" : {
            url : "fetch.php",
            type : "POST",
            data:{
              fill_askes : fill_askes,
              dari : dari,
              sampai : sampai
            }
          }
        });
      }
      $('#fill_askes').change(function(){
        var fill_askes = $('#fill_askes').val();
        var dari = $('#dari').val();
        var sampai = $('#sampai').val();
        if(fill_askes != ''){
          $('#table_pasien').DataTable().destroy();
          fill_datatable(fill_askes, dari, sampai);
        }else{
          $('#table_pasien').DataTable().destroy();
          fill_datatable();
        }
      });
    });
    </script>

