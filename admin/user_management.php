
   <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">USER MANAGEMENT</li>
      </ol>
       <center><h2><i class="fa fa-user-circle"></i>User Management</h2></center>
      <hr>

         <div class="card mb-3">
        <div class="card-header">  
         <button type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#tambah">Tambah User</button></a>
        </div>
        <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id= "table_user" width="100%">
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Level</th>
            <th style="display: none;">lv</th>
            <th style="display: none;">id</th>
            <th>Action</th>
          </tr>
           <tbody>

        <?php

          include "../koneksi.php";
            

            $query ="SELECT * FROM tb_user";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
          ?>
          <tr>
                <td width="10px"> <?php echo $id;?></td>
                <td><?php echo $data['username'];?></td>
                <td>
                  <?php
                      if ($data['level']== 1 ) {
                        echo 'Admin';
                      }elseif ($data['level']== 2 ) {
                        echo 'Resepsionis';
                      }elseif ($data['level']== 3 ) {
                        echo 'Dokter';
                      }
                   ?>
               </td>
                <td style="display: none;"><?php echo $data['level'];?></td>
                <td style="display: none;"><?php echo $data['id'];?></td>
                <td align="pull-right">
                    <a href="" class="btn btn-success btn-sm" data-target="#edit" data-toggle="modal" title=""><span class="fa fa-pencil-square-o"> Edit</span></a>
                    &nbsp
                    <a href="proses_user_managament.php?kode=1&id=<?php echo $data['id']; ?>" onclick="return confirm('hapus data?');" class="btn btn-outline btn-danger btn-sm" title="Hapus Data"><span class="fa fa-trash"> Hapus</span></a>
                </td>
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

    <div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       
       <form action="proses_user_managament.php?kode=2&id=" method="POST" class="form" accept-charset="utf-8">
      
      <div class="form-group">
        <label> UserName :</label>
        <input type="text" class="form-control" name="username" value="">
      </div>
      <div class="form-group">
        <label> Level :</label>
        <select name="level" class="form-control" required">
          <option selected="" disabled >~ Pilih Level ~</option>}
          <option value="1"> Admin</option>
          <option value="2"> Resepsionis</option>
        </select>
      </div>
      <div class="form-group">
        <label> Password :</label>
        <input type="password" class="form-control" name="password" value="">
      </div>


     </div>
    <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       
       <form action="proses_user_managament.php?kode=3&id=" method="POST" class="form" accept-charset="utf-8"> 
     <input style="display: none;" type="text" name="id" id="id" value="">
          <div class="form-group">
        <label> UserName :</label>
        <input type="text" class="form-control" name="username" id="username" value="">
      </div>
      <div class="form-group">
        <label> Level :</label>
        <select name="level" class="form-control" id="level" value="">
          <option selected="" disabled >~ Pilih Level ~</option>
          <option value="1">Admin</option>
          <option value="2">Resepsionis</option>
          <option value="3">Dokter</option>
        </select>
      </div>
      <div class="form-group">
        <label> Password :</label>
        <input type="password" class="form-control" name="password_">
      </div>

     </div>
    <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Edit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>

<script>
$(".btn[data-target='#edit']").on('click',function(){
 $("#id").val($(this).closest('tr').children()[4].textContent);
  $("#username").val($(this).closest('tr').children()[1].textContent);
  $("#level").val($(this).closest('tr').children()[3].textContent);
});
</script>

