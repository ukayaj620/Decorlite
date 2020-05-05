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
		}
		@media (min-width: 577px) {
			.main-container-grid {
				width: 75%;
			}
		}
	</style>
</head>

<body>

<?php $this->load->view('header/userHeader', array('name' => $this->session->name)); ?>

<div style="min-height: calc(100vh - 348px)" class="w-100% d-flex justify-content-center align-items-center my-4">
	<?php if ($cartData != null): ?>
		<div class="row my-4 main-container-grid">
			<?php foreach ($cartData as $cart): ?>
				<div class="col-12 col-md-4 py-4">
					<div class="card">
						<img style="height: 300px;" class="card-img-top custom-card" src="<?php echo site_url($cart->itemImage) ?>">
						<div class="card-body d-flex flex-column">
							<div class="d-flex justify-content-between align-items-center">
								<h5 class="text-dark">&times;<?= $cart->JumalahBarang ?></h5>
								<h5 class="text-dark"><?= $cart->itemName ?></h5>
							</div>
							<div class="d-flex mt-2 mx-2 flex-column">
								<a href="<?= base_url('item/getUpdateItemDescription/'.$cart->itemId.'/'.$cart->JumalahBarang) ?>" class="btn btn-warning my-2 w-100">Ganti</a>
								<a href="<?= base_url('cart/deleteItemInCart/'.$cart->itemId)?>" class="btn btn-danger my-2 w-100">Hapus</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="main-container-grid d-flex flex-column align-items-center">
			<div class="h5">Anda belum menambahkan barang ke keranjang</div>
			<a href="<?= base_url('user/home') ?>" class="btn btn-warning mt-3">Lihat barang sekarang</a>
		</div>
	<?php endif; ?>
</div>

<?php if ($cartData): ?>
	<div class="w-100% d-flex justify-content-center align-items-center">
		<div class="main-container-grid mx-2 mx-md-0 mb-4 d-flex flex-column align-items-stretch align-items-md-end">
			<a href="<?= base_url('/cart/buy/'.$cartData[0]->CartId)?>" class="btn btn-warning px-4 px-md-5">Beli</a>
		</div>
	</div>
<?php endif; ?>

<?php $this->load->view('/footer/footer') ?>

</body>
</html>
