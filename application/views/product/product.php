<link rel="stylesheet" href="<?php echo base_url('css/product.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/card.css'); ?>">

<div class="header-container">
    <h1 class="display-5">Latest Arrival Products</h1>
    <h6>These are the products that's just arrived this month, Check it out!</h6>
</div>
<div class="custom-container"> 
    <?php foreach ($items as $item) {?>
        <div class="col-md-3 py-4">
            <a href="<?php echo base_url(); ?>/">
                <div class="card">
                    <img class="card-img-top custom-card" src="<?php echo $item->itemImage ?>">
                    <div class="card-body">
                        <h6 class="card-title text-dark text-center"><?php echo $item->itemName ?></h6>
                        <br />
                        <h6 class="card-title text-dark text-center"><b>Rp. <?php echo $item->itemPrice ?>,00</b></h6>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>
