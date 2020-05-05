<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>

<head>
	<title>Decorlite</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
				integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900">
	<link rel="icon" href="/icon.png">
	<link rel="stylesheet" href="/assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url('css/card.css'); ?>">
	<style>
		@media (max-width: 576px) {
			.main-container-grid {
				width: 100%;
			}
			.custom-content {
				font-size: 10px;
			}
			.custom-title {
				font-size: 12px;
			}
		}
		@media (min-width: 577px) {
			.main-container-grid {
				width: 75%;
			}
			.custom-content {
				font-size: 14px;
			}
			.custom-title {
				font-size: 18px;
			}
		}
	</style>
</head>

<body>

<?php $this->load->view('header/userHeader', array('name' => $this->session->name)); ?>

<div style="min-height: calc(100vh - 348px);" class="w-100 d-flex justify-content-center my-4">
	<?php if ($allPaymentId): ?>
		<div class="main-container-grid d-flex flex-column">
			<?php for ($i = 0; $i < count($allPaymentId); ++$i): ?>
				<?php $subtotal = 0 ?>
				<div class="card w-100 my-2">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<h3 class="h5 md-h3 font-weight-bold">#<?= $allPaymentId[$i]['paymentId'] ?> <span class="badge badge-primary">Paid</span></h3>
							<a class="btn btn-primary" data-toggle="collapse" href="#<?= $allPaymentId[$i]['paymentId'] ?>" role="button" aria-expanded="false" aria-controls="<?= $allPaymentId[$i]['paymentId'] ?>">
								Lihat detail
							</a>
						</div>
						<div class="collapse mt-2" id="<?= $allPaymentId[$i]['paymentId'] ?>">
							<div class="card card-body">
								<div class="row d-flex flex-row">
									<h5 class="col-3 col-md-4 custom-title">Nama Barang</h5>
									<h5 class="col-3 col-md-2 custom-title">Jumlah</h5>
									<h5 class="col-3 col-md-3 custom-title">Harga</h5>
									<h5 class="col-3 col-md-3 custom-title">Total</h5>
								</div>
								<?php foreach ($allDataItems[$i] as $item): ?>
									<?php $subtotal += $item['itemPrice'] * $item['itemCount'] ?>
									<div class="row d-flex flex-row">
										<div class="col-3 col-md-4 custom-content"><?= $item['itemName'] ?></div>
										<div class="col-3 col-md-2 custom-content">&times;<?= $item['itemCount'] ?></div>
										<div class="col-3 col-md-3 custom-content">Rp<?= $item['itemPrice'] ?></div>
										<div class="col-3 col-md-3 custom-content">Rp<?= $item['itemPrice'] * $item['itemCount'] ?></div>
									</div>
								<?php endforeach; ?>
								<hr class="mt-3" />
								<div class="row d-flex flex-row">
									<div class="col-3 col-md-6"></div>
									<h5 class="col-5 col-md-3 font-weight-bold custom-title">Subtotal</h5>
									<h5 class="col-4 col-md-3 font-weight-bold custom-title">Rp<?= $subtotal ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	<?php else: ?>
		<div class="main-container-grid d-flex flex-column align-items-center justify-content-center">
			<div class="h5">Anda belum pernah berbelanja</div>
			<a href="<?= base_url('user/home') ?>" class="btn btn-warning mt-3">Lihat barang sekarang</a>
		</div>
	<?php endif; ?>
</div>

<?php $this->load->view('/footer/footer') ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
				integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
				crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
				integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
				crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
				integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
				crossorigin="anonymous"></script>

</body>
</html>
