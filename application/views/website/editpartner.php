<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= form_open_multipart(); ?>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<input type="hidden" name="id" value="<?= $partner['id']; ?>">
				<label for="title">
					Partner Name
				</label>
				<input type="text" name="nama" id="nama" class="form-control" value="<?= $partner['nama']; ?>">
				<label for="gambar">
					Logo
				</label>
				<div class="row">
					<div class="col-sm-6">
						<img src="<?= base_url('assets/image/partner/') . $partner['gambar']; ?>" alt="" class="img-thumbnail">
					</div>
					<div class="col-sm">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="gambar" name="gambar">
							<label class="custom-file-label" for="customFile">Choose File</label>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Change</button>

		</div>
	</div>

	</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
