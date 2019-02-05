var rec;
var gumStream; //stream from getUserMedia()
var stream_;

var app = new Vue({
	el: '#app',
	data: {
		is_data:false,
		is_question:false,
		is_text:false,
		is_multiselect:false,

		enterprise:{},
		question_index:0,
		questions:[],

		response:[

		],

		recording:false,
		//webkitURL is deprecated but nevertheless
		URL: window.URL || window.webkitURL,
		input:null, //MediaStreamAudioSourceNode we'll be recording

		// shim for AudioContext when it's not avb.
		AudioContext: window.AudioContext || window.webkitAudioContext,
		audioContext:null //audio context to help us record
	},
	methods: {

		startRecording() {
			console.log("recordButton clicked");

			if (stream_!=null){
				console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

				/*
					create an audio context after getUserMedia is called
					sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
					the sampleRate defaults to the one set in your OS for your playback device

				*/
				this.audioContext = new AudioContext();

				//update the format
				// document.getElementById("formats").innerHTML = "Format: 1 channel pcm @ " + this.audioContext.sampleRate / 1000 + "kHz"

				/*  assign to gumStream for later use  */
				gumStream = stream_;

				/* use the stream */
				this.input = this.audioContext.createMediaStreamSource(stream_);

				/*
					Create the Recorder object and configure to record mono sound (1 channel)
					Recording 2 channels  will double the file size
				*/
				rec = new Recorder(this.input, {
					numChannels: 1
				})

				//start the recording process
				this.recording=true
				rec.record()

				console.log("Recording started");
				console.log(rec)
			}




		},

		pauseRecording() {
			console.log("pauseButton clicked rec.recording=", rec.recording);
			if (rec.recording) {
				//pause
				rec.stop();
				pauseButton.innerHTML = "Resume";
			} else {
				//resume
				rec.record()
				pauseButton.innerHTML = "Pause";

			}
		},

		stopRecording() {
			console.log("stopButton clicked");

			rec.stop();

			//create the wav blob and pass it on to createDownloadLink
			this.next(false)
			rec.exportWAV(this.createDownloadLink);


			this.recording=false
		},
		next(create){
			if (create){
				if (this.questions[this.question_index].sub_questions.length==0){
					value = this.questions[this.question_index].value;
				}else{
					value = this.questions[this.question_index].sub_questions.filter(data=>data.sub_question_id == this.questions[this.question_index].value)[0].sub_question;
					// console.log(value)
				}

				this.response.push({
					question_id:this.questions[this.question_index].question_id,
					question:this.questions[this.question_index].question,
					data:'<div style="width:90%;padding:10px;border-radius:20px;box-shadow:0 0 4px rgba(0,0,0,.7);margin:auto;color:#607D8B">'+value+'</div>',
					value:this.questions[this.question_index].value,
					type:this.questions[this.question_index].question_type_id,
				})
			}
			this.question_index++

			if (this.question_index == this.questions.length-1 && this.questions[this.question_index -1].question_type_id!=1){
				this.save_all();
			}


		},

		createDownloadLink(blob) {
			var url = this.URL.createObjectURL(blob);
			var au = document.createElement('audio');
			var li = document.createElement('li');
			var link = document.createElement('a');

			//name of .wav file to use during upload and download (without extendion)
			var filename = new Date().toISOString();

			//add controls to the <audio> element
			au.src = url;

			// let el = this
			var formData = new FormData();
			formData.append("audio_data", blob, filename);
			$.ajax({
				type: "POST",
				url: base_url + "voicesurvey/",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				cache: false,
				success: (data)=> {
					// alert('Guardado');
					this.response.push({
						question_id:this.questions[this.question_index-1].question_id,
						question:this.questions[this.question_index-1].question,
						data:'<audio controls="" src="'+au.src+'" style="width:90%"></audio>',
						value:data.file,
						type:this.questions[this.question_index-1].question_type_id,
					})

					if (this.question_index == this.questions.length-1){
						this.save_all();
					}
					// alert(data);  //as a debugging message.
				}
			}); // you have missed this bracket
		},

		save_all(){
			console.log(this.response)
			$.ajax({
				type: "POST",
				url: base_url + "voicesurvey/",
				data: {
					enterprise:this.enterprise,
					data: this.response.map(data=>{
						return {
							'question_id':data.question_id,
							'value':data.value
						}
					})
				},
				cache:false,
				dataType: "json",
				success: function(data) {
					console.log(data)
				}
			}); // you have missed this bracket
		},

		isIOSSafari() {
			var userAgent;
			userAgent = window.navigator.userAgent;
			return userAgent.match(/iPad/i) || userAgent.match(/iPhone/i);
		},

		// taken from mo.js demos
		isTouch() {
			var isIETouch;
			isIETouch = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
			return [].indexOf.call(window, 'ontouchstart') >= 0 || isIETouch;
		}
	},
	created(){

		if (data.length>0){
			var constraints = {
				audio: true,
				video: false
			}
			navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
				stream_ = stream;
			}).catch(function (err) {
				stream_ = null
				//enable the record button if getUserMedia() fails
				console.log(err)
			});


			// taken from mo.js demos
			var isIOS = this.isIOSSafari()
			this.clickHandler = isIOS || this.isTouch() ? 'touchstart' : 'mousedown'
			this.clickHandler2 = isIOS || this.isTouch() ? 'touchend' : 'mouseup'

			this.is_data = true,
			this.enterprise =  {
					enterprise_description:data[0].enterprise_description,
					enterprise_id:data[0].enterprise_id,
					enterprise_logo:data[0].enterprise_logo,
					enterprise_name:data[0].enterprise_name
				}

			this.questions = data[0].questions.map((data,index)=>{
				return {
					question: data.question,
					active:(index==0)?true:false,
					question_id: data.question_id,
					question_type_id: data.question_type_id,
					value:'',
					sub_questions:data.subquestions
				}
			})
			// console.log(this.questions)
		}


	}
})
