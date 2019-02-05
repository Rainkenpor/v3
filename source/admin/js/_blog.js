$(function() {
	'use strict'


	var app = new Vue({
		el: '#app',
		data: {
			question_index:0, //indica la pregunta a visualizar
			items:[],
			editor:null,
			tagg:null,
			blog_id:null,

			title:'',
			alias:'',
			blog_type:1,
			tags:'',
			blog_iframe:'',
			autor:''
		},
		watch:{
			title(value){
				this.alias = this.title.replace(/ /g,'-')
				this.alias = this.alias.replace(/\./g,'')
				this.alias = this.alias.replace(/\:/g,'')
				this.alias = this.alias.replace(/\,/g,'')
				// this.alias = this.alias.replace(new RegExp("\\s", 'g'),"");
				this.alias = this.alias.toLowerCase();
			   	this.alias = this.alias.replace(new RegExp("[àáâãäå]", 'g'),"a");
			    this.alias = this.alias.replace(new RegExp("æ", 'g'),"ae");
			    this.alias = this.alias.replace(new RegExp("ç", 'g'),"c");
			    this.alias = this.alias.replace(new RegExp("[èéêë]", 'g'),"e");
			    this.alias = this.alias.replace(new RegExp("[ìíîï]", 'g'),"i");
			    this.alias = this.alias.replace(new RegExp("ñ", 'g'),"n");
			    this.alias = this.alias.replace(new RegExp("[òóôõö]", 'g'),"o");
			    this.alias = this.alias.replace(new RegExp("œ", 'g'),"oe");
			    this.alias = this.alias.replace(new RegExp("[ùúûü]", 'g'),"u");
			    this.alias = this.alias.replace(new RegExp("[ýÿ]", 'g'),"y");
			    // this.alias = this.alias.replace(new RegExp("\\W", 'g'),"");
			}
		},
		methods:{
			clear(){
				this.editor.setData('');
				$('#priority').bootstrapToggle('off')
				// $('#title').val('');
				this.blog_id = null
				this.title = ''
				this.alias = ''
				$('#uploadimage').val('');
				this.blog_type = 1
				this.tags=''
				this.blog_iframe=''
				this.tagg.tagging( "removeAll" );
				this.autor =''
			},
			save(){
				var el = this
				var datetime = $('#gmi-datepicker--input').val()
				var description = this.editor.getData();
				var priority = $('#priority').prop('checked');
				var title = this.title;

				this.tags = this.tagg.tagging( "getTags" ).join(',')

				var formData = new FormData();
				formData.append('title', title);
				formData.append('alias', this.alias);
				formData.append('author', this.autor);
				formData.append('blog_type',this.blog_type);
				formData.append('blog_iframe',(this.blog_iframe=='')?'':this.blog_iframe);
				formData.append('tags',this.tags);
				formData.append('description', description);
				formData.append('start_date', datetime.split(' - ')[0]);
				formData.append('end_date', datetime.split(' - ')[1]);
				formData.append('is_priority', ((priority==true)?1:0));
				formData.append('uploadimage',$('#uploadimage')[0].files[0]);

				if (this.blog_id!=null)
				formData.append('blog_id', this.blog_id);

				$.ajax({
					type: "POST",
					url: base_url + "blog/",
					data: formData,
					cache: false,
				    contentType: false,
				    processData: false,
					dataType: "json",
					cache: false,
					success: function(data) {
						alert('Guardado');
						el.load();
						el.clear();
						// alert(data);  //as a debugging message.
					}
				}); // you have missed this bracket
			},
			edit(item){
				// var datetime = $('#gmi-datepicker--input').val()
				this.editor.setData(item.description);
				let date1=item.start_date.split(' ');
				let date1_ = date1[0].split('-');
				date1=date1_[2]+'/'+date1_[1]+'/'+date1_[0]+' '+date1[1]

				let date2=item.end_date.split(' ');
				let date2_ = date2[0].split('-');
				date2=date2_[2]+'/'+date2_[1]+'/'+date2_[0]+' '+date2[1]

				$('#gmi-datepicker--input').val(date1 + ' - ' +date2);

				if (item.is_priority=='1'){
					console.log('on')
					$('#priority').bootstrapToggle('on')
				}else{
					$('#priority').bootstrapToggle('off')
				}

				this.title = item.title;
				this.alias = item.alias;
				this.blog_type = item.blog_type;
				this.blog_id = item.blog_id;
				this.tags = item.tags_;
				this.blog_iframe = item.blog_iframe;
				this.autor = item.author;
// console.log(item.tags)
				this.tagg.tagging( "add" ,item.tags.map(data=>{return data.tag}))
			},
			remove(item){
				let el = this
				$.ajax({
					type: "POST",
					url: base_url + "blog/delete",
					data: {
						blog_id:item.blog_id
					},
					dataType: "json",
					cache: false,
					success: function(data) {
						alert('Eliminado');
						el.load();
						// alert(data);  //as a debugging message.
					}
				}); // you have missed this bracket
			},
			load(){
				let el = this
				$.ajax({
					type: "GET",
					url: base_url + "blog/get_all",
					dataType: "json",
					cache: false,
					success: function(data) {
						el.items = data.map(data=>{
							return {
								...data,
								'tags_':data.tags.join(',')
							}
						});
					}
				}); // you have missed this bracket
			}

		},
		mounted(){
			this.load()

			$('#gmi-datepicker--input').daterangepicker({
				timePicker: true,
				startDate: moment().startOf('hour'),
				endDate: moment().startOf('hour').add(32, 'hour'),
				locale: {
					format: 'D/MM/Y HH:mm:ss'
				}
			});

			let t = $('#tags').tagging();
			this.tagg = t[0]

			this.editor = CKEDITOR.replace('textarea');

			$('#priority').bootstrapToggle({
		      on: 'Activo',
		      off: 'Inactivo'
		    });
		}
	})

})
