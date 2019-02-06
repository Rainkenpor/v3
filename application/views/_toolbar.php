<nav id="nav-menu-logo-social" class="navbar navbar-expand-sm light">
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
</nav>

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
<!-- Final Fecha y Hora -->
