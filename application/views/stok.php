<?= $this->session->flashdata('pesan'); ?>

<div class="card">
  	<div class="card-body">
    	<table id="example1" class="table table-bordered table-striped">
      		<thead>
		      	<tr class="text-center">
			        <th>No</th>
			        <th>Nama Barang</th>
			        <th>Jenis</th>
			        <th>Satuan</th>
			        <th>Jumlah Barang</th>
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
				        <td><?=	$dtb->jumlah_barang ?></td>
				    </tr>
	  			</tbody>
  			<?php endforeach ?>
		</table>
	</div>
</div>
</body>
</html>