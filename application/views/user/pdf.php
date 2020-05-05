<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>

<head>
	<title>Decorlite</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/card.css'); ?>">
</head>

<body>

<?php $subtotal = 0 ?>
<div class="w-100 my-2">
	<div class="">
		<div class="d-flex justify-content-between">
			<h3 class="h5 md-h3 font-weight-bold">#<?= $paymentId ?> <span class="badge badge-primary">Paid</span></h3>
		</div>
		<table style="width: 800px;">
			<thead class="">
				<tr>
					<th class="custom-title">Nama Barang</th>
					<th class="custom-title">Jumlah</th>
					<th class="custom-title">Harga</th>
					<th class="custom-title">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dataItems as $item): ?>
					<?php $subtotal += $item['itemPrice'] * $item['itemCount'] ?>
					<tr>
						<td class="custom-content"><?= $item['itemName'] ?></td>
						<td class="custom-content">&times;<?= $item['itemCount'] ?></td>
						<td class="custom-content">Rp<?= $item['itemPrice'] ?></td>
						<td class="custom-content">Rp<?= $item['itemPrice'] * $item['itemCount'] ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td><hr/></td>
					<td><hr/></td>
					<td><hr/></td>
					<td><hr/></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td><h5 class="font-weight-bold custom-title">Subtotal</h5></td>
					<td><h5 class="font-weight-bold custom-title">Rp<?= $subtotal ?></h5></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

</body>
</html>
