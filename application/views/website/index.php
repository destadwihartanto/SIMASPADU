<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProgramModal"><i class="fas fa-plus"> Tambah</i> </a>
	<div class="row">
		<div class="col-lg">

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
									<th scope="col">Title</th>
									<!-- <th scope="col">Desc</th> -->
									<th scope="col">Image</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($program as $p) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $p['title']; ?></td>
										<!-- <td><?= $p['desc']; ?></td> -->
										<td>
											<img src="<?= base_url('assets/image/program/') . $p['image']; ?>" class="card-img " style="width: 4rem;" alt="...">
										</td>
										<td>
											<a href="<?= base_url('website/editprogram/') . $p['id']; ?>" class="btn btn-success btn-circle btn-sm">
												<i class="fas fa-edit"></i>
											</a>
											<a href="<?= base_url('website/deleteprogram/') . $p['id']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="btn btn-danger btn-circle btn-sm">
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
<div class="modal fade" id="newProgramModal" tabindex="-1" role="dialog" aria-labelledby="newProgramModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newProgramModal">Add New Program</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart(); ?>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="title" name="title" placeholder="Program title" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="url" name="desc" placeholder="Desc" required>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" required>
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