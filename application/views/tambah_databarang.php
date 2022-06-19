<form action="<?= base_url('databarang/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama_barang" class="form-control">
		<?= form_error('nama_barang', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Jenis</label>
		<input type="text" name="jenis" class="form-control">
		<?= form_error('jenis', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Satuan</label>
		<input type="text" name="satuan" class="form-control">
		<?= form_error('satuan', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Harga Beli</label>
		<input type="text" name="harga_beli" class="form-control">
		<?= form_error('harga_beli', '<div class="text-small text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>Harga Jual</label>
		<input type="text" name="harga_jual" class="form-control">
		<?= form_error('harga_jual', '<div class="text-small text-danger">', '</div>'); ?>
	</div>

	<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
</form>