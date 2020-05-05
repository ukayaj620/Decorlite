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
</head>

<body>

	<?php $this->load->view('header/userHeader', array('name' => $this->session->name)); ?>

	<?php $this->load->view('user/item/description/descriptionContent', array('itemData' => $itemData)) ?>

	<?php $this->load->view('/footer/footer') ?>
</body>
</html>
