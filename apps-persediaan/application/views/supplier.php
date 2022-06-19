<?= $this->session->flashdata('pesan'); ?>

<div class="card">
  	<div class="card-header">
    	<a href="<?= base_url('supplier/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Supplier</a>
  	</div>
  	<!-- /.card-header -->
  	<div class="card-body">
    	<table id="example1" class="table table-bordered table-striped">
      		<thead>
		      	<tr class="text-center">
			        <th>No</th>
			        <th>Nama Supplier</th>
			        <th>Alamat</th>
			        <th>Nomor HP</th>
			        <th>Aksi</th>
		      	</tr>
		    </thead>
		    <?php $no = 1;
		    foreach($supplier as $spl) : ?>
	      		<tbody>
				    <tr class="text-center">
				        <td><?= $no++ ?></td>
				        <td><?= $spl->nama_supplier  ?></td>
				        <td><?= $spl->alamat  ?></td>
				        <td><?= $spl->nomor_hp  ?></td>
				        <td>
				        	<button data-toggle="modal" data-target="#ubah_aksi<?= $spl->id_supplier ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
				        	<a href="<?= base_url('supplier/delete/' . $spl->id_supplier) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
				        </td>
				    </tr>
	  			</tbody>
  			<?php endforeach ?>
		</table>
	</div>
</div>


<!-- Modal Edit -->
<?php foreach($supplier as $spl) : ?>
<div class="modal fade" id="ubah_aksi<?= $spl->id_supplier ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
			    </div>
			<div class="modal-body">

	        	<form action="<?= base_url('supplier/ubah_aksi/'. $spl->id_supplier) ?>" method="POST">
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" name="nama_supplier" class="form-control" value="<?= $spl->nama_supplier ?>">
						<?= form_error('nama_supplier', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?= $spl->alamat ?>">
						<?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Nomor HP</label>
						<input type="text" name="nomor_hp" class="form-control" value="<?= $spl->nomor_hp ?>">
						<?= form_error('nomor_hp', '<div class="text-small text-danger">', '</div>'); ?>
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
