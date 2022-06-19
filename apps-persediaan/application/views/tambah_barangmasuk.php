<form action="<?= base_url('barangmasuk/tambah_aksi') ?>" method="POST">
	
	<div class="form-group">
		<label>Nama Barang</label>
		<select class="form-control "name="id_databarang">
			<option value="null">Pilih Barang</option>
			<?php
		    foreach($databarang as $dtb) : ?>
	      		<option value="<?= $dtb->id_databarang; ?>"><?= $dtb->nama_barang; ?></option>
  			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Supplier</label>
		<select class="form-control" name="id_supplier">
			<option value="null">Pilih Supplier</option>
			<?php
		    foreach($supplier as $spl) : ?>
	      		<option value="<?= $spl->id_supplier; ?>"><?= $spl->nama_supplier; ?></option>
  			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Jumlah Masuk</label>
		<input step=".1" min="0" type="number" name="jumlah_masuk" class="form-control">
		<?= form_error('jumlah_masuk', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Tanggal Masuk</label>
		<input type="date" name="tanggal_masuk" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
</form>