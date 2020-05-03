<link rel="stylesheet" href="<?php echo base_url('css/product.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/items.css'); ?>">

<div class="header-container">
    <h1 class="display-5">Latest Arrival Products</h1>
    <h6>These are the products that's just arrived this month, Check it out!</h6>
</div>
<div class="custom-container"> 
    <?php foreach ($items as $item) {?>
        <div class="col-3">
            <a href="<?php echo base_url(); ?>/">
                <div class="card"">
                    <img class="card-img-top" src="<?php echo $item->itemImage ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-dark text-center"><?php echo $item->itemName ?></h5>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>