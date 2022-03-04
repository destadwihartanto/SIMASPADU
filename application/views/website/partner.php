<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPartnerModal"><i class="fas fa-plus"> Tambah</i> </a>
	<div class="row">
		<div class="col-lg">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="dataable table table-striped table-hover display" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Partner Name</th>
									<th scope="col">Logo</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php $i = 1; ?>
								<?php foreach ($partner as $p) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $p['nama']; ?></td>
										<td>
											<img src="<?= base_url('assets/image/partner/') . $p['gambar']; ?>" class="card-img " style="width: 2rem;" alt="...">
										</td>
										<td>
											<a href="<?= base_url('website/editpartner/') . $p['id']; ?>" class="btn btn-success btn-circle btn-sm">
												<i class="fas fa-edit"></i>
											</a>
											<a href="<?= base_url('website/deletepartner/') . $p['id']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="btn btn-danger btn-circle btn-sm">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newPartnerModal" tabindex="-1" role="dialog" aria-labelledby="newPartnerModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPartnerModalLabel">Form Tambah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

<?= form_open_multipart('website/partner'); ?>
			<div class="modal-body">
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Partner name" required>
			</div>
			<div class="modal-body">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="gambar" name="gambar" required>
					<label class="custom-file-label" for="customFile">Choose File</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-md btn-icon-split" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
				<button type="submit" class="btn btn-primary btn-md btn-icon-split"><i class="fas fa-save"></i> Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan') ?>
<?php else: ?>
<script>
$(document).ready(function() {
    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {

    })
});
</script>
<?php endif; ?>