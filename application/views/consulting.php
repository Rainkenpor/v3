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
				<div class="content-box d-inline-block">
					<img class="mw-100 mb-30 mt--100" alt="" src="<?php echo base_url(); ?>source/images/illustration-1.png" width="300px">
				</div>
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

<section id="subscribe-field" class="text-center pt-30 pb-30 light">
	<div class="container">
		<div class="row">
			<div class="col-md-11 col-lg-9 ml-auto mr-auto">
				<div class="" style="text-align:center">
					<h3 class="">Consultoría en Negocios Digitales</h3>
					<br>
				</div>

				<div id="app" style="background-color:#00aa4b; margin:auto;overflow: hidden;  width:100%; max-width: 700px; padding:10px; border-radius:20px; ">
					<form action="">

						<div id="recaptcha" class="g-recaptcha" ></div>

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
											<button v-for="(sub,subquestion_index) in subquestion.sub_options"
												v-on:click="subquestion.value=subquestion_index"
											 	type="button"
												 class="btn btn-questions animated fadeInUp"
												:class="['delay-'+(subquestion_index+1)+'m']">
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
				<div style="text-align:center;margin-top:10px;" ><span style="cursor: pointer" data-toggle="modal" data-target="#popup-instructivo">Instructivo</span></div>
			</div>
		</div>
	</div>
	<div class="bg-wrap">
		<div class="bg"></div>
	</div>
</section>


<script>
var app = new Vue({
    el: '#app',
    data: {
        mySwiper: '',
        question_index:0, //indica la pregunta a visualizar
        questions:[]
    },
    methods: {
    	initReCaptcha: function() {
	        var self = this;
	        setTimeout(function() {
	            if(typeof grecaptcha === 'undefined') {
	                self.initReCaptcha();
	            }
	            else {
	                grecaptcha.render('recaptcha', {
	                    'sitekey': '6LcUWJAUAAAAAHe2y38p2usNCKTeIXDaNfZElq0C',
	                    'size': 'invisible',
	                    'callback': self.save
	                });
	            }
	        }, 2000);
	    },

	    validate(){
	    	grecaptcha.execute();
	    },
        next_option() {
            this.question_index ++
            if (this.questions.length-1==this.question_index) this.validate()
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
				var el = this;
				$.ajax({
                type: "POST",
                url:  "<?php echo base_url(); ?>consulting/get",
                data: {data: this.questions},
                dataType: "json",
                cache:false,
                success:
                    function(response){
                        el.questions = response;
						console.log(el.questions)
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert("some error");
						console.log(XMLHttpRequest);
					}
                });// you have missed this bracket


        },


		save(){
            $.ajax({
                type: "POST",
                url:  "<?php echo base_url(); ?>consulting_save/",
                data: {data: this.questions},
                dataType: "text",
                cache:false,
                success:
                    function(data){
                        // alert(data);  //as a debugging message.
                    }

                });// you have missed this bracket
		}
    },
    mounted() {
        this.mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            // loop: true,
        })
        this.mySwiper.allowTouchMove = false;
        this.get_questions()
        this.initReCaptcha()
    }
})
</script>
