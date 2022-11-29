<div class="main-panel">
<div class="content-wrapper">
<div class="row purchace-popup">
<div class="col-12">

<div class="col-lg-12 stretch-card">
 <div class="card">
   <div class="card-body">
     <h2 class="card-title">Table Kategori</h2>
     <a href="#tambah" class="btn btn-success" data-toggle="modal">
      <span class="glyphicon glyphicon-plus"></span> Add Kategori</a>
      <p></p>

     <div class="table-responsive">
       <table class="table table-bordered">
         <thead>
           <tr class="table-primary">
             <th>No</th>
             <th>Nama</th>
             <th>Action</th>
           </tr>
         </thead>

         <tbody>
           <?php
                   $no=1;
                   foreach ($kategori as $b) {
                     $no++;
                     echo '<tr >
                     <td>'.$no.'</td>
                     <td>'.$b->nama_kat.'</td>
                     <td>
                      <a href="#" onclick="prepare_update_kat('.$b->id_kat.')" data-toggle="modal" data-target="#Ubah" class="btn btn-warning">Edit</a>
                      <a href="'.base_url().'index.php/kat/hapus/'.$b->id_kat.'"class="btn btn-danger btn-md" onclick="return confirm(\'Anda Yakin Ingin Menghapus Data\')">Delete</a> </td>
                     </tr>';
                   }
                   ?>
         </tbody>

<!-- Tambah Kategori Mobil -->
<div class="modal fade" id="tambah">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"></button>
<h4 class="modal-title" id="myModalLabel">Add  Kategori</h4>
</div>
<div class="modal-body">
<form action="<?php echo base_url() ?>index.php/kat/tambah" method="post">
Nama
<input type="text" name="nama_kat" class="form-control"></br>
<input type="submit" name="simpan" value="Save" class="btn btn-success">
<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>

</form>
       </table>
       <?php if($this->session->flashdata('pesan')!=null): ?>
                   <div class= "alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
                   <?php endif?>

       
<!-- Edit Kategori Mobil                  -->
<div class="modal fade" id="Ubah">
<div class="modal-dialog">
<div class="modal-content">
<form action="<?php echo base_url() ?>index.php/kat/Ubah" method="post">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">
<span class="sr-only">Close</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
</div>
<div class="modal-body">

<input type="hidden" name="id_kat_edit" id="id_kat_edit">

Nama Kategori
<input type="text" name="nama_kat_edit" class="form-control" id="nama_kat_edit"><br>

<input type="submit" name="simpan" value="Save" class="btn btn-success" data>
<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                 </form>

</div>


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


<script type="text/javascript">
             function prepare_update_kat(id_kat){
               $.getJSON('<?php echo base_url() ?>index.php/kat/json_kat_by_id/'+id_kat, function(data){
                 $("#id_kat_edit").val(data.id_kat);
                 $("#nama_kat_edit").val(data.nama_kat);
               });
             }
             </script>





<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
