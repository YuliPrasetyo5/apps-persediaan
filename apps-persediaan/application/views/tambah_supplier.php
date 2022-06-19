<form action="<?= base_url('supplier/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Nama Supplier</label>
		<input type="text" name="nama_supplier" class="form-control">
		<?= form_error('nama_supplier', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control">
		<?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Nomor HP</label>
		<input type="text" name="nomor_hp" class="form-control">
		<?= form_error('nomor_hp', '<div class="text-small text-danger">', '</div>'); ?>
	</div>

	<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
</form>