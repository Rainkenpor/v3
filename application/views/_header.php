<?php
$this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Digital Age | Soluciones Estratégicas Digitales</title>

	<link rel="icon" href="<?php echo base_url(); ?>source/images/digital-age-fav.png" type="image/png">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/fonts.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.weber.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/fx.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/magnific-popup.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/index.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/animate.css" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">

</head>
<style type="text/css">
	#app label,
	#app h4 {
		color: white;
		font-size: 16px;
	}

	#app .form-control {
		color: white
	}

	.swiper-container {
		width: 100%;
		/* height: 300px; */
	}

	.btn-questions {
		box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .2);
		background-color: white;
		color: #333333;
		margin-left: 5px;
		margin-right: 5px;
		margin-bottom: 5px;
		border-radius: 17px !important;
		font-size: 13px;
		transition: all ease 0.5s;

		max-width: 100%;
		white-space: normal;
	}

	.btn-questions img {
		margin-top: -9px;
	}

	.btn-questions:hover {
		box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.8);
		/* color: white; */
	}

	.btn-questions.active {
		box-shadow: 0 0 1rem rgba(0, 0, 0, 0.8);

		border-bottom: 3px solid #4CAF50;
		/* background-color: #4CAF50; */
	}

	body {
		font-family: 'Gotham' !important;
	}
</style>



<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCByts0vn5uAYat3aXEeK0yWL7txqfSMX8"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<script src="<?php echo base_url(); ?>source/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/twitterFetcher.js"></script>
<script src="<?php echo base_url(); ?>source/js/custom.js"></script>
<script src="<?php echo base_url(); ?>source/js/index.js"></script>

<body class="light-page">
	<div id="wrap">
