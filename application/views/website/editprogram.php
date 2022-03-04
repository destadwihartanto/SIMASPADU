<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= form_open_multipart(); ?>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<input type="hidden" name="id" value="<?= $program['id']; ?>">
				<label for="title">
					Judul
				</label>
				<input type="text" name="title" id="title" class="form-control" value="<?= $program['title']; ?>">
				<label for="desc">
					Deskripsi
				</label>
				<textarea class="form-control" name="desc" id="desc" rows="3"><?= $program['desc']; ?></textarea>
				<!-- <input type=" text-area" name="title" id="title" class="form-control" value="<?= $program['desc']; ?>"> -->
				<label for="image">
					Poster
				</label>
				<div class="row">
					<div class="col-sm-6">
						<img src="<?= base_url('assets/image/program/') . $program['image']; ?>" alt="" class="img-thumbnail">
					</div>
					<div class="col-sm">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image">
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
