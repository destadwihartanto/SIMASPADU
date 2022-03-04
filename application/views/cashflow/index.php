<!-- refresh halaman otomatis reload -->
<!-- <meta http-equiv="refresh" content="5" /> -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTrx" ><i class="fas fa-plus"> Tambah</i> </a>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="dataable table table-striped table-hover display" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Kode</th>
									<th scope="col">Keterangan</th>
									<th scope="col">Pemasukan</th>
									<th scope="col">Pengeluaran</th>
									<!-- <th scope="col">Saldo</th> -->
									<th scope="col">Dibuat</th>
									<th scope="col">Oleh</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$total = 0;
								?>
								<?php foreach ($kas as $p) :
									//  $debet[] = $p->debet; $total_debet = array_sum($debet);
									//  $kredit[] = $p->kredit; $total_kredit = array_sum($kredit);

									?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $p['kd_rek']; ?></td>
										<td><?= $p['keterangan']; ?></td>
										<td><?= number_format($p['debet'], 0, '', ',') ?></td>
										<td><?= number_format($p['kredit'], 0, '', ',') ?></td>
										<!-- <td></td> -->
										<td><?= $p['created']; ?></td>
										<td><?= $p['id_user']; ?></td>
										<td>
											<a href="#" class="btn btn-success btn-circle btn-sm">
												<i class="fas fa-edit"></i>
											</a>

											<a href="<?= base_url('cashflow/hapus_kas/') . $p['id']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="btn btn-danger btn-circle btn-sm">
												<i class="fas fa-trash"></i>
											</a>
										</td>

									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
							<tr>
								<th colspan="3" style="text-align: center; font-size: 15px" class="alert alert-dark">Cashflow </th>
								<th colspan="1" style="text-align: center; font-size: 15px" class="alert alert-info"><?php echo "Rp." . number_format($total_debet) . ",-"; ?></th>
								<th colspan="1" style="text-align: center; font-size: 15px" class="alert alert-warning"><?php echo "Rp." . number_format($total_kredit) . ",-"; ?></th>
								<th colspan="3"   style="font-size: 15px; text-align: left;" class="danger alert-danger"><p>Saldo Akhir : <?php echo "Rp." . number_format($total_saldo) . ",-"; ?></p></th>
								<th class="danger alert-danger"></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="newTrx" tabindex="-1" role="dialog" aria-labelledby="newTrx" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newTrx">Form Arus Kas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('cashflow'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group"><label>Tanggal</label>
						<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal" required>
					</div>

					<!-- keterangan -->
                    <div class="form-group"><label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" maxlength="50"required></textarea>
                    </div>

					<div class="form-group"><label>Kategori</label>
						<select class="form-control chosen" name="method" id="inputGroupSelect01" required>
							<option selected disabled>Pilih</option>
							<option value="debet">Debet</option>
							<option value="kredit">Kredit</option>
						</select>
					</div>
					<div class="form-group"><label>Nominal</label>
						<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Rp." required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-md btn-icon-split" data-dismiss="modal">
					<span class="text text-white">Batal</span>
					<span class="icon text-white-50">
					<i class="fas fa-times"></i>
					</span>
				</button>

					<button type="submit" class="btn btn-primary btn-md btn-icon-split">
					<span class="text text-white">Simpan Data</span>
					<span class="icon text-white-50">
					<i class="fas fa-save"></i>
					</span>
				</button>
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
