<div class="container-fluid">

	<!-- Page Heading -->
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
                                <th scope="col">No</th>
									<th scope="col">Kode</th>
									<th scope="col">Keterangan</th>
									<th scope="col">Pemasukan</th>
									<th scope="col">Pengeluaran</th>
									<!-- <th scope="col">Saldo</th> -->
									<th scope="col">Dibuat</th>
									<th scope="col">Oleh</th>
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


									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
							<tr>
								<th colspan="3" style="text-align: center; font-size: 15px" class="alert alert-dark">Cashflow </th>
								<th colspan="1" style="text-align: center; font-size: 15px" class="alert alert-info"><?php echo "Rp." . number_format($total_debet) . ",-"; ?></th>
								<th colspan="1" style="text-align: center; font-size: 15px" class="alert alert-warning"><?php echo "Rp." . number_format($total_kredit) . ",-"; ?></th>
								<th colspan="1"   style="font-size: 15px; text-align: left;" class="danger alert-danger"><p>Saldo Akhir : <?php echo "Rp." . number_format($total_saldo) . ",-"; ?></p></th>
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
