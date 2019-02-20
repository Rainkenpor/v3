<?php
$this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<title>Encuesta por voz</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0,  user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="<?php echo base_url(); ?>source/images/favicon.png" type="image/png">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134564299-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-134564299-1');
	</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/fonts.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/bootstrap.weber.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/fx.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/magnific-popup.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/index.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/css/animate.css" />

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/fontello.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/animate.css">
	<link rel="manifest"   href="<?php echo base_url(); ?>source/_apps/voicesurvey/manifest.json">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/icons.css" />



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
body{
	font-family: 'Gotham' !important;
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
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
<script src="<?php echo base_url(); ?>source/js/index.js"></script>

<body class="light-page">

	<!--<nav id="nav-menu-logo-social" class="navbar navbar-expand-sm light">
		<div class="container-fluid">
			<div class="navbar-collapse">
				<ul class="navbar-nav m-auto text-center">
					<li class="nav-item">
						<a class="navbar-brand" href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>source/images/Logo_Digital_Age_Final-01.png" height="60px" alt="">
						</a>
					</li>
					<li class="nav-item custom-menu">
						<a class="nav-link" href="#subscribe-field">Consultoría</a>
					</li>
					<li class="nav-item custom-menu">
						<a class="nav-link" href="#">Inscríbete</a>
					</li>
				</ul>
			</div>
			<ul class="datetime navbar-nav">
				<li id="datetime" class="nav-item">
					<div id="hour"></div>
					<div id="date"></div>
				</li>
			</ul>
		</div>
	</nav>-->
	<nav id="nav-menu-logo-social" class="navbar navbar-expand-sm light">
		<div class="container-fluid">
				<div class="navbar-collapse">
			    <ul class="navbar-nav">
						<li class="nav-item">
							<a class="navbar-brand" href="<?php echo base_url(); ?>">
								<img src="<?php echo base_url(); ?>source/images/digital-age.png" height="60px" alt="">
							</a>
						</li>
			      <!--<li class="nav-item custom-menu">
			        <a class="nav-link" href="#">Inscríbete</a>
			      </li>-->
			    </ul>
		  	</div>
				<ul class="datetime navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>#subscribe-field" style="color:#737373;"><i class="fas fa-headset" style="color:#00aa4b; font-size:16px;"></i> Solicita tu Consultoría</a>
					</li>
					<!--<li id="datetime" class="nav-item">
						<div id="hour"></div>
						<div id="date"></div>
					</li>-->
				</ul>
		</div>
	</nav>



		<div  id="app"  v-cloak>
			<div class="toolbar">
				<span style="position:relative;top:10px;left:10px">
					Encuesta por voz
				</span>
				<img :src="'<?php echo base_url(); ?>source/_apps/voicesurvey/enterprise/'+enterprise.enterprise_logo" alt="" height="100%" style="float:right">
			</div>


			<div style="padding-bottom:70px;">
				<div v-if = "is_data">
					<!-- <div id="formats">Format: start recording to see sample rate</div> -->
					<div class="row justify-content-md-center">
						<div class="col-sm-9"  v-for="(question,index) in questions" v-if="index==question_index" style="padding:10px 45px">
							<div style="text-align:center;padding:40px 5px;color:#607D8B">
								<h3 :class="(index==question_index)?'fadeIn animated':'fadeOut animated'"
								v-html="question.question"></h3>
								<label v-if="question.question_type_id==1" style="color:#F44336">Mantener presionado para grabar</label>
							</div>
							<div :style="'display:'+((question.question_type_id==1)?'inherit':'none')"  class="button_mic icobutton" id="button_mic" v-on:mousedown="startRecording()" v-on:mouseup="stopRecording()" v-on:touchstart="startRecording()" v-on:touchend="stopRecording()">
								<img class="img-mic" src="<?php echo base_url(); ?>source/_apps/voicesurvey/icon/mic.png"  style="position:relative;top:60px">
							</div>
							<div v-if="question.question_type_id==2" >
								<input type="text" v-on:keypress.enter="((question.value!='')?next(true):'')"  class="form-control" style="color:#607D8B;width:100%;border-radius:40px" v-model="question.value">
								<div class="button_next" :class="((question.value=='')?'disabled':'')" v-on:click="((question.value!='')?next(true):'')">
									Siguiente
								</div>
							</div>
							<div v-if="question.question_type_id==3" >
								<select type="text" class="form-control" style="color:#607D8B;width:100%;border-radius:40px" v-model="question.value">
									<option :value="sub.sub_question_id" v-for="sub in question.sub_questions">{{sub.sub_question}}</option>
								</select>
								<div class="button_next" v-on:click="((question.value!='')?next(true):'')" :class="((question.value=='')?'disabled':'')">
									Siguiente
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row justify-content-md-center">
						<div class="col-sm-9">
							<div class="" v-for="resp in response">
								<!-- {{file}} -->
								<h4 v-html="resp.question" style="color:#607D8B"></h4>
								<div class="" v-html="resp.data" style="text-align:center;margin-bottom:15px">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div v-else>
					<div class="" style="padding:30px;text-align:center;color:#607D8B">
						<i class="fas fa-exclamation-circle" style="font-size:20px"></i>
						<br>
						No se encontro la evaluación
					</div>
				</div>
			</div>
		</div>
	</body>
	<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
	<script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/recorder.js"></script>
	<script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/vue.js"></script>
	<script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/service_worked.js"></script>
	<script type="text/javascript">
	var data = '<?php echo print_r($list,true);?>';
	var base_url = '<?php echo base_url(); ?>';
	data = JSON.parse(data);
	service_worked(document,window,navigator,console.log,base_url);
	</script>
	<!-- Inicio función fecha y hora -->
	<script>
		setInterval(function(){
		var d = new Date();
		var hour = d.getHours();
		var minutes = d.getMinutes();
		hour = ((hour>12)?hour-12:hour);
		hour = ((hour<10)?'0'+hour:hour);
		minutes = ((minutes<10)?'0'+minutes:minutes);

		$('#datetime #hour').html(hour + ':' + minutes);


		let options = {
			year: 'numeric',
			month: 'short',
			day: 'numeric',
		};

		$('#datetime #date').html(d.toLocaleString('es-gt', options));

	}, 1000);

	</script>
	<script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/app.js"></script>

	<script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/mo.min.js"></script>
	<script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/demo.js"></script>

	</html>
