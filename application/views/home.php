<div class="modal fade" id="popup-instructivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center padding-x2 light">
			<button type="button" class="close position-absolute r-0 t-0" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg"
				 height="16" viewBox="0 0 16 16" width="16" class="icon svg-secondary">
					<path d="m8.07106781 6.65685425 5.65685429-5.65685425 1.4142135 1.41421356-5.65685423 5.65685425 5.65685423 5.65685429-1.4142135 1.4142135-5.65685429-5.65685423-5.65685425 5.65685423-1.41421356-1.4142135 5.65685425-5.65685429-5.65685425-5.65685425 1.41421356-1.41421356z"
					 fill-rule="evenodd"></path>
				</svg></button>
			<div class="modal-body">
				<h3 class="mb-20"><strong>¡Recibe una consultoría gratuita!</strong></h3>
				<table width="100%" style="text-align: left">
					<tr>
						<td valign="top">
							1.
						</td>
						<td>
							Cada semana el equipo de Digital Age seleccionará una postulación y se le brindará una consultoría gratuita.
						</td>
					</tr>
					<tr>
						<td valign="top">
							2.
						</td>
						<td>
							La consultoría será transmitida a través de redes sociales.
						</td>
					</tr>
					<tr>
						<td valign="top">
							3.
						</td>
						<td>
							La consultoría será enfocada en tema en específico aplicable según el caso.
						</td>
					</tr>
				</table>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center padding-x2 light">
			<button type="button" class="close position-absolute r-0 t-0" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg"
				 height="16" viewBox="0 0 16 16" width="16" class="icon svg-secondary">
					<path d="m8.07106781 6.65685425 5.65685429-5.65685425 1.4142135 1.41421356-5.65685423 5.65685425 5.65685423 5.65685429-1.4142135 1.4142135-5.65685429-5.65685423-5.65685425 5.65685423-1.41421356-1.4142135 5.65685425-5.65685429-5.65685425-5.65685425 1.41421356-1.41421356z"
					 fill-rule="evenodd"></path>
				</svg></button>
			<div class="modal-body">
				<h3 class="mb-20"><strong>Bienvenido a la Era Digital <br>¿Estás listo?</strong></h3>
				<iframe width="100%" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
				 allowfullscreen></iframe>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</div>
	</div>
</div>


<div id="app">
	<section id="gallery-3col-4" class="gallery light">
		<div class="container-fluid">
			<div class="row no-gutters">


				<div :class="(index_blog==0)?'col-sm-12 col-md-6':'col-sm-6 col-md-3'" v-for="(blog,index_blog) in blogs_trending()">

					<div class="gallery-item gallery-style-5 text-center padding-x2" >
						<a :href="((blog.blog_type==1)?'./blog/info/'+blog.alias:'#')" v-on:click="((blog.blog_type==2)?show_modal(blog.blog_iframe):'')">
						<div style="width:100%;height:300px;overflow:hidden">
							<img :src="'<?php echo base_url(); ?>source/images/blog/'+blog.cover+'.jpg'" alt="" style="margin-top: -10%; width:100%;min-height:110%">
						</div>
						</a>
						<div class="item-title">
							<h4 class=""><strong style="font-family:'Gotham';color:white; text-shadow: 0 0 7px black" v-html="blog.title"></strong></h4>
						</div>

					</div>
				</div>

			</div>
		</div>
		<div class="bg-wrap">
			<div class="bg"></div>
		</div>
	</section>
	<section id="subscribe-field" class="text-center pt-30 pb-30 light">
		<div class="container">
			<div class="row">
				<div class="col-md-11 col-lg-9 ml-auto mr-auto">
					<div class="" style="text-align:center">
						<h3 class="">Consultoría en Negocios Digitales</h3>
						<br>
					</div>


					<div  style="background-color:#00aa4b; margin:auto;overflow: hidden;  width:100%; max-width: 700px; padding:10px; border-radius:20px; ">
						<form action="">
							<div style="padding:10px" v-for="(question,index) in questions" class="animated fadeInUp" v-if="index==question_index">
	                            <!-- {{question}} -->
								<label>{{question.question}}</label>
								<div style="text-align:center; margin-top: 10px">
									<div v-if="question.type_question!='text'">
										<button type="button"  v-for="(sub,sub_index) in question.sub_options" class="btn btn-questions" :class="[index==question_index?'animated fadeInUp':'','delay-'+(sub_index+1)+'m']"
										 v-on:click="question.value=sub.sub_id; ((sub.sub_question.length==0)?next_option():'') " :style="((sub.image)?'height:50px':'')+';margin-bottom:10px'">
	                                        <img v-if="sub.image" style="width:40px" :src="'<?php echo base_url(); ?>source/src/flags/'+sub.image" alt="">
	                                        <span v-if="!sub.image">{{sub.sub}}</span>
										</button>
									</div>
									<div v-else="question.type_question == 'text'">
										<input type="((question.input_type)?question.input_type:'text')" class="form-control animated fadeInUp"
										 v-model="question.value">
										<br>
										<button type="button" class="btn btn-questions animated fadeInUp" style="float:right" v-on:click="next_option(question_index,{next:1})">Siguiente</button>
									</div>

									<div v-if="sub.sub_question.length>0 && sub.sub_id==question.value" class="animated fadeInUp" v-for="(sub,index) in question.sub_options"
									 style="padding:10px;">
										<hr>
										<div v-for="subquestion in sub.sub_question">
	                                    <!-- {{subquestion}} -->
											<label>{{subquestion.question}}</label>
											<!-- texto -->
											<input type="text" class="form-control" v-if="subquestion.type_question=='text'" v-model="subquestion.value">
											<!-- sub -->
											<div v-if="subquestion.type_question=='sub'">
												<button v-for="(sub,subquestion_index) in subquestion.sub_options" v-on:click="subquestion.value=subquestion_index"
												 type="button" class="btn btn-questions animated fadeInUp" :class="['delay-'+(subquestion_index+1)+'m']">
	                                                <span v-if="sub.icon" :class="sub.icon" :style="'color:'+sub.icon_color" style="font-size:20px"></span>
	                                                <span v-if="!sub.icon">{{sub.sub}}</span>
	                                             </button>
												<br>
												<table width="100%" v-if="subquestion.type_question=='sub' && subquestion.value !==''" style="margin-top:10px">
													<tr>
														<td width="20px">
															<button type="button" class="btn btn-questions animated fadeInUp" :class="['delay-'+(index+1)+'m']"><span
																 v-if="subquestion.sub_options[subquestion.value].icon" :class="subquestion.sub_options[subquestion.value].icon" :style="'color:'+subquestion.sub_options[subquestion.value].icon_color" style="font-size:20px"></span><span v-if="!subquestion.sub_options[subquestion.value].icon">{{subquestion.sub_options[subquestion.value].sub}}</span></button>
														</td>
														<td>
															<input type="text" class="form-control" :class="['delay-'+(index+1)+'m']" v-model="subquestion.sub_options[subquestion.value].value">
														</td>
													</tr>
												</table>
											</div>
										</div>
										<br>
										<button type="button" class="btn btn-questions animated fadeInUp" style="float:right" v-on:click="next_option()">Siguiente</button>
									</div>
								</div>
							</div>
						</form>
						<!-- <div v-on:click="save()" style="text-align:center;margin-top:10px;cursor: pointer" >save</div>	 -->
					</div>


					<div style="text-align:center;margin-top:10px;"><span style="cursor: pointer" data-toggle="modal" data-target="#popup-instructivo">Instructivo</span></div>
				</div>
			</div>
		</div>
		<div class="bg-wrap">
			<div class="bg"></div>
		</div>
	</section>





	<section id="blog-2col-sidebar" class="pt-50 pt-md-100 pb-md-50 dark">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">

	                    <div class="col-sm-4" v-for="blog in blogs_body()">
							<div class="gallery-item gallery-style-1 padding-x2 mb-50 border">
								<a :href="((blog.blog_type==1)?'./blog/info/'+blog.alias:'#')" v-on:click="((blog.blog_type==2)?show_modal(blog.blog_iframe):'')">
									<img class="item-img" :src="'<?php echo base_url(); ?>source/images/blog/'+blog.cover+'.jpg'" alt="image">
								</a>
								<div class="item-title" style="height:220px;overflow:hidden;text-align:justify">
									<h4  style="text-align:left" class=""><strong >{{blog.title}}</strong></h4>
									<p class="text-secondary small">{{blog.created}} | {{blog.author}}</p>

									<p v-html="blog.description">
									</p>
								</div>
								<a href="./blog/info/no-importa-quien-lo-invente-lo-que-importa-es-cuanto-impacta" style="float:right;padding-right:30px;margin-bottom:10px;margin-top:5px">Seguir leyendo</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="bg-wrap">
			<div class="bg"></div>
		</div>
	</section>

	<section id="testimonial-5col" class="pt-75 pb-50 text-center light spr-edit-el spr-oc-show spr-wout">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 text-center">
					<h3><strong>Nuestra metodología</strong></h3>
					<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 40 20" width="40" class="mb-50 svg-secondary" src="images/gallery/decor/line-h-1.svg"
					 alt="sep">
						<path d="m0 8h40v4h-40z" fill-rule="evenodd"></path>
					</svg>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<i class="fas fa-brain" style="font-size:40px; margin-bottom:10px"></i>
						<p>Analizamos</p>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<i class="far fa-lightbulb" style="font-size:40px; margin-bottom:10px"></i>
						<p>Generamos Estrategias</p>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<i class="far fa-newspaper" style="font-size:40px; margin-bottom:10px"></i>
						<p>Generamos Contenido</p>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<i class="far fa-comments" style="font-size:40px; margin-bottom:10px"></i>
						<p>Interactuamos</p>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<i class="fas fa-search-dollar" style="font-size:40px; margin-bottom:10px"></i>
						<p>Monitoreamos</p>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<i class="fas fa-print" style="font-size:40px; margin-bottom:10px"></i>
						<p>Generamos Reportes</p>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-wrap">
			<div class="bg"></div>
		</div>
	</section>

	<section id="benefits-4col-counter-2" class="counter-up text-center spr-edit-el dark spr-oc-show spr-wout">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 text-center">
					<br>
					<br>
					<h3><strong>Servicios</strong></h3>
					<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 40 20" width="40" class="mb-50 svg-secondary" src="images/gallery/decor/line-h-1.svg"
					 alt="sep">
						<path d="m0 8h40v4h-40z" fill-rule="evenodd"></path>
					</svg>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50" style="font-shadow:none">
						<a href="./consulting">
							<i class="fas fa-headset" style="font-size:40px; margin-bottom:10px"></i>
							<p>Consultorías</p>
						</a>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50" style="font-shadow:none">
						<a href="./training">
							<i class="fas fa-chalkboard-teacher" style="font-size:40px; margin-bottom:10px"></i>
							<p>Capacitaciones</p>
						</a>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50" style="font-shadow:none">
						<a href="./digital-media">
							<i class="fas fa-laptop" style="font-size:40px; margin-bottom:10px"></i>
							<p>Medios Digitales</p>
						</a>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50" style="font-shadow:none">
						<a href="./digital-technology">
							<i class="fas fa-mobile-alt" style="font-size:40px; margin-bottom:10px"></i>
							<p>Tecnologías Digitales</p>
						</a>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50" style="font-shadow:none">
						<a href="./expert-content">
							<i class="fas fa-book-reader" style="font-size:40px; margin-bottom:10px"></i>
							<p>Contenido Especializado</p>
						</a>
					</div>
				</div>
				<div class="col-lg col-md-4">
					<div class="content-box bg-default padding mb-50">
						<a href="./activations">
							<i class="fas fa-chart-line" style="font-size:40px; margin-bottom:10px"></i>
							<p>Activaciones</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-wrap">
			<div class="bg"></div>
		</div>
	</section>

	<section id="team-2col-2" class="pt-50 pt-lg-100 pb-lg-50 text-center light">
	    			<div class="container">
	        			<div class="row">
	            			<div class="col-12 ml-auto mr-auto" style="z-index: 10;">
	                			<h3 class="" style="overflow: visible; color: #555"><strong class="">Nuestros Directores</strong></h3>
	                			<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 40 20" width="40" class="icon svg-secondary mb-50"><path d="m0 8h40v4h-40z" fill-rule="evenodd"></path></svg>
	            			</div>
	            			<div class="col-lg-6">
	                			<div class="content-box bg-default shadow d-sm-flex mb-50 text-left">
	                    			<div class="text-center align-self-end">
	                        			<img src="<?php echo base_url(); ?>source/images/diego.png" width="220px" alt="team" class="" srcset="">
	                    			</div>
	                    			<div class="padding-x2" style="">
	                        			<h4 class="mb-0"><strong class="">Diego Eduardo de León</strong></h4>
	                        			<p class="">Projects Leader</p>
	                        			<p class="" style="">Especialista en marketing y comunicación digital, transformación digital y ventas<br></p>
	                        			<div class="inline-group">
	                            			<a href="#" class="smooth" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon"><path d="m8.54611842 16h-7.66304125c-.48785295 0-.88307717-.3954695-.88307717-.8831324v-14.23379728c0-.48778708.3952863-.88307032.88307717-.88307032h14.23390773c.4876667 0 .8830151.39528324.8830151.88307032v14.23379728c0 .487725-.3954105.8831324-.8830151.8831324h-4.0772165v-6.19608178h2.0797387l.3114113-2.41472301h-2.39115v-1.54164808c0-.69911803.1941355-1.1755439 1.1966615-1.1755439l1.2786739-.00055875v-2.15974763c-.2211418-.0294274-.980176-.09517343-1.8632531-.09517343-1.84357263 0-3.10573228 1.12531866-3.10573228 3.19187953v1.78079226h-2.08507782v2.41472301h2.08507782z" fill="#4460a0" fill-rule="evenodd" class=""></path></svg></a><a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m16 15.5454545h-3.5362183v-5.1133089c0-1.3384016-.5531514-2.25209123-1.7695202-2.25209123-.93038568 0-1.44778925.61657751-1.6886171 1.21080175-.09031044.21328738-.07619943.5103995-.07619943.80751158v5.3470868h-3.50329257s.04515522-9.05772842 0-9.88107361h3.50329257v1.55075762c.20696143-.67804897 1.32643463-1.64575899 3.11288803-1.64575899 2.2163688 0 3.957667 1.42129498 3.957667 4.48182928zm-14.11665099-11.11702278h-.02257761c-1.12888052 0-1.8607714-.75535401-1.8607714-1.71281878 0-.97609249.75352775-1.71561294 1.90498589-1.71561294 1.1505174 0 1.8579492.73765768 1.88052681 1.71281878 0 .95746477-.73000941 1.71561294-1.90216369 1.71561294zm-1.47977422 1.23594917h3.11853245v9.88107361h-3.11853245z" fill="#007ebb" fill-rule="evenodd"></path></svg></a><a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m.99052845 1.73676599.56361347-.56361348 4.14772049 4.14772049c-.5530294.5530294 0 1.6590882 1.6590882 3.31817639 1.65908819 1.65908821 2.76514699 2.21211761 3.31817639 1.65908821l4.1477205 4.1477205-.5635607.5635607.0000123.0000123c-.1832569.1832569-.4220376.3006747-.6790607.3339206-2.6541817.3433184-5.55815505-1.061905-8.71192009-4.21567-3.15372572-3.15372574-4.55895333-6.05766601-4.21568285-8.71182085l-.00003523-.00000455c.03324308-.25703422.1506638-.4958259.33392822-.67909031zm.56361347-.56361348.8295441-.82954409c.45814456-.45814456 1.20094364-.45814456 1.6590882 0l2.48863229 2.48863229c.45814455.45814455.45814455 1.20094364 0 1.65908819l-.8295441.8295441zm9.12498508 9.12498509.8295441-.82954411c.4581446-.45814455 1.2009436-.45814455 1.6590882 0l2.4886323 2.48863231c.4581445.4581445.4581445 1.2009436 0 1.6590882l-.8295441.8295441z" fill-rule="evenodd" class=""></path></svg></a><a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m1.16613765 1h13.66772465l-6.8338623 6.77109639zm14.83386235 1.6087151v11.2246182c0 .6443322-.4477153 1.1666667-1 1.1666667h-14c-.55228475 0-1-.5223345-1-1.1666667v-11.2246182l8 7.6201885z"></path></svg></a>
	                        			</div>
	                    			</div>
	                			</div>
	            			</div>
	            			<div class="col-lg-6">
	                			<div class="content-box bg-default shadow d-sm-flex mb-50 text-left">
	                    			<div class="text-center align-self-end">
	                        			<img src="<?php echo base_url(); ?>source/images/carlos.png" width="220px" alt="team" class="" srcset="">
	                    			</div>
	                    			<div class="padding-x2" style="">
	                        			<h4 class="mb-0" style=""><strong class="">Carlos Morales</strong></h4>
	                        			<p class="">Communications Leader</p>
	                        			<p class="text-secondary">Especialista en marketing y comunicación digital e impresa, manejo de redes sociales y medios</p>
	                        			<div class="inline-group">
	                            			<a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m8.54611842 16h-7.66304125c-.48785295 0-.88307717-.3954695-.88307717-.8831324v-14.23379728c0-.48778708.3952863-.88307032.88307717-.88307032h14.23390773c.4876667 0 .8830151.39528324.8830151.88307032v14.23379728c0 .487725-.3954105.8831324-.8830151.8831324h-4.0772165v-6.19608178h2.0797387l.3114113-2.41472301h-2.39115v-1.54164808c0-.69911803.1941355-1.1755439 1.1966615-1.1755439l1.2786739-.00055875v-2.15974763c-.2211418-.0294274-.980176-.09517343-1.8632531-.09517343-1.84357263 0-3.10573228 1.12531866-3.10573228 3.19187953v1.78079226h-2.08507782v2.41472301h2.08507782z" fill="#4460a0" fill-rule="evenodd"></path></svg></a><a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m16 15.5454545h-3.5362183v-5.1133089c0-1.3384016-.5531514-2.25209123-1.7695202-2.25209123-.93038568 0-1.44778925.61657751-1.6886171 1.21080175-.09031044.21328738-.07619943.5103995-.07619943.80751158v5.3470868h-3.50329257s.04515522-9.05772842 0-9.88107361h3.50329257v1.55075762c.20696143-.67804897 1.32643463-1.64575899 3.11288803-1.64575899 2.2163688 0 3.957667 1.42129498 3.957667 4.48182928zm-14.11665099-11.11702278h-.02257761c-1.12888052 0-1.8607714-.75535401-1.8607714-1.71281878 0-.97609249.75352775-1.71561294 1.90498589-1.71561294 1.1505174 0 1.8579492.73765768 1.88052681 1.71281878 0 .95746477-.73000941 1.71561294-1.90216369 1.71561294zm-1.47977422 1.23594917h3.11853245v9.88107361h-3.11853245z" fill="#007ebb" fill-rule="evenodd" class=""></path></svg></a><a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m.99052845 1.73676599.56361347-.56361348 4.14772049 4.14772049c-.5530294.5530294 0 1.6590882 1.6590882 3.31817639 1.65908819 1.65908821 2.76514699 2.21211761 3.31817639 1.65908821l4.1477205 4.1477205-.5635607.5635607.0000123.0000123c-.1832569.1832569-.4220376.3006747-.6790607.3339206-2.6541817.3433184-5.55815505-1.061905-8.71192009-4.21567-3.15372572-3.15372574-4.55895333-6.05766601-4.21568285-8.71182085l-.00003523-.00000455c.03324308-.25703422.1506638-.4958259.33392822-.67909031zm.56361347-.56361348.8295441-.82954409c.45814456-.45814456 1.20094364-.45814456 1.6590882 0l2.48863229 2.48863229c.45814455.45814455.45814455 1.20094364 0 1.65908819l-.8295441.8295441zm9.12498508 9.12498509.8295441-.82954411c.4581446-.45814455 1.2009436-.45814455 1.6590882 0l2.4886323 2.48863231c.4581445.4581445.4581445 1.2009436 0 1.6590882l-.8295441.8295441z" fill-rule="evenodd" class=""></path></svg></a><a href="#" class=""><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16 16" width="16" class="icon" srcset=""><path d="m1.16613765 1h13.66772465l-6.8338623 6.77109639zm14.83386235 1.6087151v11.2246182c0 .6443322-.4477153 1.1666667-1 1.1666667h-14c-.55228475 0-1-.5223345-1-1.1666667v-11.2246182l8 7.6201885z" class=""></path></svg></a>
	                        			</div>
	                    			</div>
	                			</div>
	            			</div>
	        			</div>
	    			</div>
	    			<div class="bg-wrap">
	        			<div class="bg"></div>
	    			</div>
				</section>
</div>





<script>
	var app = new Vue({
		el: '#app',
		data: {
			mySwiper: '',
			question_index:0, //indica la pregunta a visualizar
			questions:[],
            blogs:[]
		},
		methods: {
			next_option() {
				this.question_index ++
				if (this.questions.length-1==this.question_index) this.save()
			},
			preview_option() {
				this.mySwiper.slidePrev()
			},

			subquestion_filter(sub){
				return sub.filter(data=> data.active==true)
			},

			subquestion_select(subquestions,sub){
				console.log(subquestions)
				subquestions.map(data=>{
					data.active=false
				})
				sub.active=true
			},

			get_questions(){
				axios.get("<?php echo base_url(); ?>/consulting/get")
				.then(response=>{
					this.questions = response.data;
					// console.log(response.data);
				})
				.catch(err=>{
					console.log(err);
				})
			},


			save(){
				$.ajax({
					type: "POST",
					url:  "<?php echo base_url(); ?>/consulting_save/",
					data: {data: this.questions},
					dataType: "text",
					cache:false,
					success:
						function(data){
							// alert(data);  //as a debugging message.
						}
					});// you have missed this bracket
			},

            load_blog(){
                let el = this
				// console.log('===========================================')
				$.ajax({
					type: "GET",
					url:  "<?php echo base_url(); ?>/blog/get",
					dataType: "json",
					cache: false,
					success: function(data) {
						// console.log(data)
						el.blogs = data.map(data=>{
							let date = data.date_created.split(' ')[0]
							date = date.split('-')
							return {
								...data,
								'created':date[2] +'/'+ date[1]+'/'+ date[0]
							}
						});
					}
				}); // you have missed this bracket
            },

			blogs_trending(){
				return this.blogs.filter((data,index)=>index<3)
			},

			blogs_body(){
				return this.blogs.filter((data,index)=>index>=3)
			},

			show_modal(url){
				// console.log(url)
				$('#popup iframe').attr('src', url);
				$('#popup').modal('show');
			},
		},
		mounted() {
			$("#popup").on('hidden.bs.modal', function (e) {
				$("#popup iframe").attr("src", '');
			});

			this.mySwiper = new Swiper('.swiper-container', {
				// Optional parameters
				direction: 'horizontal',
				// loop: true,
			})
			this.mySwiper.allowTouchMove = false;
			this.get_questions()
			this.load_blog()
		}
	})

</script>
