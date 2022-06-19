<?= $this->session->flashdata('pesan'); ?>

<div class="card">
  	<div class="card-header">
    	<a href="<?= base_url('barangkeluar/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Barang keluar</a>
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
			        <th>Jumlah Keluar</th>
			        <th>Tanggal Keluar</th>
			        <th>Aksi</th>
		      	</tr>
		    </thead>
		    <?php $no = 1;
		    foreach($barangkeluar as $bgk) : ?>
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
				        <td><?= $bgk->nama_barang  ?></td>
				        <td><?= $bgk->jenis  ?></td>
				        <td><?= $bgk->satuan  ?></td>
				        <td><?= $bgk->jumlah_keluar  ?></td>
				        <td><?= $bgk->tanggal_keluar  ?></td>
				        <td>
				        	<button data-toggle="modal" data-target="#edit<?= $bgk->id_barangkeluar ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
				        	<a href="<?= base_url('barangkeluar/delete/' . $bgk->id_barangkeluar) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
				        </td>

				    </tr>
	  			</tbody>
  			<?php endforeach ?>
		</table>
	</div>
</div>


<!-- Modal Edit -->
<?php foreach($barangkeluar as $bgk) : ?>

<div class="modal fade" id="edit<?= $bgk->id_barangkeluar ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Barang keluar</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
			</div>

			<div class="modal-body">
	        	<form action="<?= base_url('barangkeluar/edit/'. $bgk->id_barangkeluar) ?>" method="POST">
					<div class="form-group">
						<label>Nama Barang</label>
						<select class="form-control "name="id_barangkeluar">
							<option value="null"><?= $bgk->nama_barang ?></option>
								<?php
						    		foreach($databarang as $dtb) : ?>
					      	<option value="<?= $dtb->id_databarang; ?>"><?= $dtb->nama_barang; ?></option>
				  				<?php endforeach ?>
						</select><?= form_error('nama_barang', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					
					<div class="form-group">
						<label>Jumlah Masuk</label>
						<input type="text" name="jumlah_keluar" class="form-control" value="<?= $bgk->jumlah_keluar ?>">
						<?= form_error('jumlah_keluar', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Tanggal Keluar</label>
						<input type="text" name="tanggal_keluar" class="form-control" value="<?= $bgk->tanggal_keluar ?>">
						<?= form_error('tanggal_keluar', '<div class="text-small text-danger">', '</div>'); ?>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
						<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
					</div>
				</form>
			</div>
	    </div>
  	</div>
</div>
<?php endforeach ?>
