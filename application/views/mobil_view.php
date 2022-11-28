<div class="main-panel">
<div class="content-wrapper">
<div class="row purchace-popup">
<div class="col-12">




<div class="col-lg-12 stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Tables Mobil</h4>
     <a href="#tambah" class="btn btn-success" data-toggle="modal">
      <span class="glyphicon glyphicon-plus"></span> + add Mobil</a>
      <p></p>

     <div class="table-responsive">
       <table class="table table-bordered">
         <thead>
           <tr class="table-primary">
             <th>
               ID
             </th>
             <th>
               Gambar
             </th>
             <th>
               Merk
             </th>
              <th>
               Kode
             </th>
             <th>
               Type
             </th>
             <th>
               Stok
             </th>
             <th>
               kategori
             </th>
             <th>
               Plat Nomor
             </th>
             <th>
               Tahun Produksi
             </th>
             <th>
               Biaya
             </th>
             <th>
               Action
             </th>
           </tr>
         </thead>


         <tbody>
           <?php
                   $no=0;
                   foreach ($mobil as $b) {
                     $no++;
                     echo '<tr >
                     <td>'.$b->id_mobil.'</td>
                     <td><img src="'.base_url().'assets/images/mobil/'.$b->gambar.'" width="50px" /></td>
                     <td>'.$b->merk.'</td>
                     <td>'.$b->kode.'</td>
                     <td>'.$b->type.'</td>
                     <td>'.$b->stok.'</td>
                     <td>'.$b->nama_kat.'</td>
                     <td>'.$b->plat_nomor.'</td>
                     <td>'.$b->tahun_produksi.'</td>
                     <td>Rp. '.$b->biaya.',-</td>
                     <td>
                     <a href="#" onclick="prepare_edit_mobil('.$b->id_mobil.')" data-toggle="modal" data-target="#edit" class="btn btn-warning">Ubah</a>
                     <a href="'.base_url().'index.php/mobil/hapus/'.$b->id_mobil.'"class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin Ingin Menghapus Data\')">Hapus</a> </td>
                     </td>
                     </tr>';
                   }
                   ?>
         </tbody>


<div class="modal fade" id="tambah">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"></button>
<h4 class="modal-title" id="myModalLabel">Add  Mobil</h4>
</div>
<div class="modal-body">
<form action="<?php echo base_url() ?>index.php/mobil/tambah" method="post" enctype="multipart/form-data">
Gambar
<input type="file" class="form-control" placeholder="gambar" name="gambar">
Merk
<input type="text" name="merk" class="form-control"></br>
Kode
<input type="text" name="kode" class="form-control"></br>
Type
<input type="text" name="type" class="form-control"></br>
Stok
<input type="text" name="stok" class="form-control"></br>
kategori
<select name="kategori" class="form-control">
					<?php
						foreach ($kategori as $b) {
							echo '
								<option value="'.$b->id_kat.'">'.$b->nama_kat.'</option>
							';
						}
					?>
	        	</select>
Plat Nomor
<input type="text" name="plat_nomor" class="form-control"></br>
Tahun Produksi
<input type="text" name="tahun_produksi" class="form-control"></br>
Biaya
<input type="text" name="biaya" class="form-control"></br>
<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
<button type="button" data-dismiss="modal" class="btn btn-default">Close </button>

</form>








       </table>
       <?php if($this->session->flashdata('pesan')!=null): ?>
                   <div class= "alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
                   <?php endif?>

<div class="modal fade" id="edit">

<div class="modal-dialog">
<div class="modal-content">
<form action="<?php echo base_url('index.php/Mobil/edit'); ?>" method="post" enctype="multipart/form-data">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">
<span class="sr-only">Close</span></button>
<h4 class="modal-title" id="myModalLabel">Edit mobil</h4>
</div>
<input type="hidden" name="edit_id_mobil" id="edit_id_mobil">
<div class="modal-body">
Merk
<input type="text" name="edit_merk" class="form-control" id="edit_merk"></br>
Kode
<input type="text" name="edit_kode" class="form-control" id="edit_kode"></br>
Type
<input type="text" name="edit_type" class="form-control" id="edit_type"></br>
Stok
<input type="text" name="edit_stok" class="form-control" id="edit_stok"></br>
kategori
<select name="edit_kategori" class="form-control" id="edit_kategori">
					<?php
						foreach ($kategori as $b) {
							echo '
								<option value="'.$b->id_kat.'">'.$b->nama_kat.'</option>
							';
						}
					?>
	        	</select>
Plat Nomor
<input type="text" name="edit_plat_nomor" class="form-control" id="edit_plat_nomor"></br>
Tahun Produksi
<input type="text" name="edit_tahun_produksi" class="form-control" id="edit_tahun_produksi"></br>
Biaya
<input type="text" name="edit_biaya" class="form-control" id="edit_biaya"></br>
<div id="gambar">

</div>

<input type="submit" name="simpan" value="Simpan" class="btn btn-success" data>
<button type="button" data-dismiss="modal" class="btn btn-default">Close </button>
                 </form>
</div>


<script type="text/javascript">
              function prepare_edit_mobil(id_mobil)
              {
               $.getJSON('<?php echo base_url() ?>index.php/Mobil/get_data_mobil_by_id/'+id_mobil, function(data){

                 $("#edit_id_mobil").val(data.id_mobil);
                 $("#edit_merk").val(data.merk);
                 $("#edit_kode").val(data.kode);
                 $("#edit_type").val(data.type);
                 $("#edit_stok").val(data.stok);
                 $("#edit_plat_nomor").val(data.plat_nomor);
                 $("#edit_tahun_produksi").val(data.tahun_produksi);
                 $("#edit_biaya").val(data.biaya);
                  $("#edit_kategori").val(data.id_kat);
			           $("#gambar").html('<img src="<?php echo base_url(); ?>assets/images/mobil/' + data.gambar + '" width="50px" >');

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
