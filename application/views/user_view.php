<div class="main-panel">
<div class="content-wrapper">
<div class="row purchace-popup">
<div class="col-12">
<div class="col-lg-12 stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">User Table</h4>
     <a href="#tambah" class="btn btn-success" data-toggle="modal">
      <span class="glyphicon glyphicon-plus"></span>Add User</a>
      <p></p>

     <div class="table-responsive">
       <table class="table table-bordered">
         <thead>
           <tr class="table-primary">
             <th>
               ID
             </th>
             <th>
               Name
             </th>
             <th>
               Username
             </th>
             <th>
               Level
             </th>
             <th>
               Action
             </th>
           </tr>
         </thead>


         <tbody>
           <?php
                   $no=0;
                   foreach ($user as $b) {
                     $no++;
                     echo '<tr >
                     <td>'.$b->id_user.'</td>
                     <td>'.$b->nama_user.'</td>
                     <td>'.$b->username.'</td>
                     <td>'.$b->level.'</td>
                     <td>

                      <a href="#" onclick="prepare_update_user('.$b->id_user.'
                     )" data-toggle="modal" data-target="#Ubah"
                     class="btn btn-warning">Ubah</a>


                     <a href="'.base_url().'index.php/User/hapus/'.$b->id_user.'"class="btn btn-danger btn-md"
                     onclick="return confirm(\'Anda yakin Ingin Menghapus Data\')">Delete</a> </td>
                     </tr>';
                   }
                   ?>
         </tbody>


         <div class="modal fade" id="tambah">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"></button>
<h4 class="modal-title" id="myModalLabel">Add User</h4>
</div>
<div class="modal-body">
<form action="<?php echo base_url() ?>index.php/User/tambah" method="post">
Name
<input type="text" name="nama_user" class="form-control"></br>
Username
<input type="text" name="username" class="form-control"></br>
Level
<select class="form-control" name="level">
              <option value="admin">Admin</option>
              <option value="kasir">kasir</option>
            </select>
Password
<input type="text" name="password" class="form-control"></br>
<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
<button type="button" data-dismiss="modal" class="btn btn-default">Close </button>

</form>
       </table>
       <?php if($this->session->flashdata('pesan')!=null): ?>
                   <div class= "alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
                   <?php endif?>

                   <div class="modal fade" id="Ubah">

<div class="modal-dialog">
<div class="modal-content">
<form action="<?php echo base_url() ?>index.php/User/Ubah" method="post">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">
<span class="sr-only">Close</span></button>
<h4 class="modal-title" id="myModalLabel">Edit User</h4>
</div>
<div class="modal-body">

<input type="hidden" name="id_user_edit" id="id_user_edit">

Nama User
<input type="text" name="nama_user_edit" class="form-control" id="nama_user_edit"><br>
Username
<input type="text" name="username_edit" class="form-control" id="username_edit"><br>
<select class="form-control" name="level_edit" id="level_edit">
              <option value="admin">admin</option>
              <option value="kasir">kasir</option>
            </select>
Password
<input type="password" name="password_edit" class="form-control" id="password_edit"><br>

<input type="submit" name="simpan" value="Simpan" class="btn btn-success" data>
<button type="button" data-dismiss="modal" class="btn btn-default">Close </button>
                 </form>

</div>

<script type="text/javascript">
             function prepare_update_user(id_user){
               $.getJSON('<?php echo base_url() ?>index.php/User/json_user_by_id/'+id_user, function(data){

                 $("#id_user_edit").val(data.id_user);
                 $("#nama_user_edit").val(data.nama_user);
                 $("#username_edit").val(data.username);
                 $("#level_edit").val(data.level);




               });
             }
             </script>

           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>




<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
