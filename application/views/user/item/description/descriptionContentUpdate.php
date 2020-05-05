<div class="row mr-md-auto">
	<div class="col-1 col-md-2">&nbsp;</div>

	<div class="col-10 col-md-4 py-4">
		<div class="card">
			<img class="card-img-top custom-card" src="<?= site_url($itemData->itemImage) ?>">
		</div>
	</div>

	<div class="col-1 d-block d-md-none">&nbsp;</div>
	<div class="col-1 d-block d-md-none">&nbsp;</div>

	<div class="col-10 col-md-4 py-md-4 d-flex flex-column justify-content-md-between align-items-center align-items-md-start">
		<div class="d-flex flex-column align-items-center align-items-md-start">
			<h1 class="my-2 my-md-4 text-center text-md-left"><?= $itemData->itemName ?></h1>
			<h3 class="h4 h3-md my-2 text-center text-md-left"><?= 'Harga: Rp'.$itemData->itemPrice ?></h3>
			<h3 class="h4 h3-md my-2 text-center text-md-left">Jumlah stok: <?= $itemData->itemStock ?></h3>
		</div>
		<div class="d-flex flex-column flex-md-row align-items-center my-4">
			<div class="d-flex flex-row align-items-center">
				<div class="h4 h3-md m-0">Beli: </div>
				<button onclick="handleDecrease()" type="button" class="btn btn-warning mx-2" style="width: 40px;">-</button>
				<div id="item-count" class="h4 h3-md m-0"><?= $itemCount ?></div>
				<button onclick="handleIncrease()" type="button" class="btn btn-warning mx-2" style="width: 40px;">+</button>
			</div>
			<a href="<?= base_url('cart/updateItemInCart/'.$itemData->itemId.'/'.$itemCount) ?>" id="add-to-cart" class="btn btn-warning ml-md-4 px-5 mt-3 mt-md-0">Update Keranjang</a>
		</div>
	</div>
</div>

<div class="row mr-md-auto">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-12 col-md-8 d-flex justify-content-center justify-content-md-start">
		<h1 class="h3 h1-md text-center text-md-left">Deskripsi Barang</h1>
	</div>
</div>

<div class="row mr-md-auto mb-5">
	<div class="col-1 col-md-2">&nbsp;</div>
	<div class="col-10 col-md-8 text-center text-md-left">
		<?= $itemData->itemDescription ?>
	</div>
</div>

<script>
	const countHolder = document.querySelector('#item-count');
	const button = document.querySelector('#add-to-cart');
	const setHref = newValue => button.href = '<?= base_url('cart/updateItemInCart/'.$itemData->itemId.'/') ?>' + newValue;
	const handleIncrease = () => {
		if (parseInt(countHolder.innerHTML)+1 <= <?= $itemData->itemStock ?>) {
			countHolder.innerHTML = (parseInt(countHolder.innerHTML) + 1).toString();
			setHref(countHolder.innerHTML);
		}
	};
	const handleDecrease = () => {
		if (parseInt(countHolder.innerHTML)-1 >= 1) {
			countHolder.innerHTML = (parseInt(countHolder.innerHTML) - 1).toString();
			setHref(countHolder.innerHTML);
		}
	};
</script>
