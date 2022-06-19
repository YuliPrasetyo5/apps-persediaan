<?= $this->session->flashdata('pesan'); ?>

<div class="card">
  	<div class="card-header">
    	<a href="<?= base_url('databarang/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Data barang</a>
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
			        <th>Harga Beli</th>
			        <th>Harga Jual</th>
			        <th>Aksi</th>
		      	</tr>
		    </thead>
		    <?php $no = 1;
		    foreach($databarang as $dtb) : ?>
	      		<tbody>
				    <tr class="text-center">
				        <td><?= $no++ ?></td>
				        <td><?= $dtb->nama_barang  ?></td>
				        <td><?= $dtb->jenis  ?></td>
				        <td><?= $dtb->satuan  ?></td>
				        <td><?= $dtb->harga_beli  ?></td>
				        <td><?= $dtb->harga_jual  ?></td>
				        <td>
				        	<button data-toggle="modal" data-target="#ubah_aksi<?= $dtb->id_databarang ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
				        	<a href="<?= base_url('databarang/delete/' . $dtb->id_databarang) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
				        </td>
				    </tr>
	  			</tbody>
  			<?php endforeach ?>
		</table>
	</div>
</div>

<!-- Modal Edit -->
<?php foreach($databarang as $dtb) : ?>
<div class="modal fade" id="ubah_aksi<?= $dtb->id_databarang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Data barang</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
			    </div>
			<div class="modal-body">

	        	<form action="<?= base_url('databarang/ubah_aksi/'. $dtb->id_databarang) ?>" method="POST">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" value="<?= $dtb->nama_barang ?>">
						<?= form_error('nama_barang', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input type="text" name="jenis" class="form-control" value="<?= $dtb->jenis ?>">
						<?= form_error('jenis', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" name="satuan" class="form-control" value="<?= $dtb->satuan ?>">
						<?= form_error('satuan', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="text" name="harga_beli" class="form-control" value="<?= $dtb->harga_beli ?>">
						<?= form_error('harga_beli', '<div class="text-small text-danger">', '</div>'); ?>
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="text" name="harga_jual" class="form-control" value="<?= $dtb->harga_jual ?>">
						<?= form_error('harga_jual', '<div class="text-small text-danger">', '</div>'); ?>
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

</body>
</html>