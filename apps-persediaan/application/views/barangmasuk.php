<?= $this->session->flashdata('pesan'); ?>

<div class="card">
  	<div class="card-header">
    	<a href="<?= base_url('barangmasuk/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Barang masuk</a>
  	</div>
  	<!-- /.card-header -->
  	<div class="card-body">
    	<table id="example1" class="table table-bordered table-striped">
      		<thead>
		      	<tr class="text-center">
			        <th>No</th>
			        <th>Nama Barang</th>
			        <th>Jenis</th>
			        <th>Satuan</th>
			        <th>Nama Supplier</th>
			        <th>Jumlah Masuk</th>
			        <th>Tanggal Masuk</th>
			        <th>Aksi</th>
		      	</tr>
		    </thead>
		    <?php $no = 1;
		    foreach($barangmasuk as $bgm) : ?>
	      		<tbody>
	      			<!-- SELECT 
	      				namabarang
	      				jenisbarang,
	      				b.satuanbarang,
	      				m.jumlah,
	      				   s.nama_supplier ,
	      				    m.tanggal_masuk 
	      				     -->
				    <tr class="text-center">
				        <td><?= $no++ ?></td>
				        <td><?= $bgm->nama_barang  ?></td>
				        <td><?= $bgm->jenis  ?></td>
				        <td><?= $bgm->satuan  ?></td>
				        <td><?= $bgm->nama_supplier  ?></td>
				        <td><?= $bgm->jumlah_masuk  ?></td>
				        <td><?= $bgm->tanggal_masuk  ?></td>
				        <td>
				        	<button data-toggle="modal" data-target="#edit<?= $bgm->id_barangmasuk ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
				        	<a href="<?= base_url('barangmasuk/delete/' . $bgm->id_barangmasuk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
				        </td>
				    </tr>
	  			</tbody>
  			<?php endforeach ?>
		</table>
	</div>
</div>


<!-- Modal Edit -->
<?php foreach($barangmasuk as $bgm) : ?>
<div class="modal fade" id="edit<?= $bgm->id_barangmasuk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Barang masuk</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
			</div>

			<div class="modal-body">
	        	<form action="<?= base_url('barangmasuk/edit/'. $bgm->id_barangmasuk) ?>" method="POST">
					<div class="form-group">
						<label>Nama Barang</label>
						<select class="form-control "name="id_barangmasuk">
							<option value="<?= $bgm->nama_barang ?>"><?= $bgm->nama_barang; ?></option>
							<?php
		    					foreach($databarang as $dtb) : ?>
	      					<option value="<?= $bgm->id_databarang; ?>"><?= $bgm->nama_barang; ?></option>
  							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label>Nama Supplier</label>
						<select class="form-control "name="id_barangmasuk">
							<option value="<?= $bgm->id_supplier ?>"><?= $bgm->nama_supplier; ?></option>
							<?php
		   						foreach($supplier as $spl) : ?>
	      					<option value="<?= $spl->id_supplier; ?>"><?= $spl->nama_supplier; ?></option>
  							<?php endforeach ?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Jumlah Masuk</label>
						<input type="text" name="jumlah_masuk" class="form-control" value="<?= $bgm->jumlah_masuk ?>">
						<?= form_error('jumlah_masuk', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Tanggal Masuk</label>
						<input type="date" name="tanggal_masuk" class="form-control" value="<?= $bgm->tanggal_masuk ?>">
					</div>

					
						<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
						<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
					
				</form>
			</div>
	    </div>
  	</div>
</div>
<?php endforeach ?>
