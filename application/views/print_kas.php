<div class="card-body">
	<div class="table-responsive">
	<table border="1" width="100%" style="text-align:center;">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Tgl</th>
					<th>Keterangan</th>
					<th>Masuk</th>
					<th>Keluar</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($kas as $p) : ?>
					<tr>
						<th scope="row"><?= $i ?></th>
						<td><?= $p['kd_rek']; ?></td>
						<td><?= $p['tgl']; ?></td>
						<td><?= $p['keterangan']; ?></td>
						<td><?= number_format($p['debet'], 0, '', ',') ?></td>
						<td><?= number_format($p['kredit'], 0, '', ',') ?></td>
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
