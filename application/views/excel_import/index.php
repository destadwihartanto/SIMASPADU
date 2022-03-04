<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">

<p class="h3 mb-0 text-gray-800"><span class="badge badge-dark">Import File Kas</span></p>
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-9">

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-5 mb-4" id="container">

<!-- Illustrations -->
<div class="card border-bottom-secondary shadow mb-4">
<?= form_open_multipart('excel_import/import_data'); ?>
<div class="custom-file">
	<input type="file" class="custom-file-input" id="file" name="file" required>
	<label class="custom-file-label" for="customFile">Format File .xls</label>
</div>
</div>
<button type="submit" class="btn btn-primary">Upload</button>

</div>
    <div class="col-lg-12 mb-4" id="container">
	<span class="badge badge-info badge-md"><h5>Total Data : <?php echo $num_rows;?></h5></span>
			</div>

</div>

</div>
<!-- /.container-fluid -->
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