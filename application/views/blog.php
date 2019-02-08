<section id="desc-text-halfbg-5" class="pt-50  pb-md-150 spr-edit-el spr-oc-show spr-wout">
    <div id="app_blog" v-cloak>
        <div class="blog_content" v-if="blog.active" v-for="blog in blogs">
            <div style="background-color:#2196F3;height: 10px;margin-bottom:10px">
                {{blog.tag}}
            </div>
            <div class="" style="padding:0 20px">
                <div class="row justify-content-md-center">
                    <div class="col-md-10" style="text-align:left">
                        <h3 v-html="blog.title"></h3>
                        <div class="" style="margin-top:-7px">
                            <small>Por {{blog.author}}</small>
                        </div>
                        <div class="" style="margin-top:-5px;margin-bottom:15px">
                            <small>{{blog.created}}</small>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-10" style="text-align:center">
                        <img class="mb-50" :src="base_url+'source/images/blog/'+blog.cover+'.jpg'" alt="logo" style="width:100%;max-width:500px">
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-10">
                        <div style="text-align:justify" v-html="blog.description">
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<style media="screen">
[v-cloak] { display: none; }
</style>

<script>
var app = new Vue({
    el: '#app_blog',
    data: {
        prueba:'fasd',
        base_url:'',
        blogs:[{
            a:'ab'
        }],
        blog_active:0
    },
    methods: {

    },
    created() {
        let el = this
        this. base_url='<?php echo base_url(); ?>';
        $.ajax({
            type: "GET",
            url:  "<?php echo base_url(); ?>blog/info/get_multi_blog/<?php echo $alias;?>",
            dataType: "json",
            cache:false,
            success:
            function(data){

                el.blogs = data.map((data,index)=>{
                    return {
                        ...data,
                        active:(index==0)?true:false
                    }
                })
                // console.log(el.blogs)
            }
        });// you have missed this bracket

        document.addEventListener("scroll", function(x){
            var body = document.body,
                html = document.documentElement;

            var height = Math.max( body.scrollHeight, body.offsetHeight,
                                   html.clientHeight, html.scrollHeight, html.offsetHeight );
            // get scroll position in px
            // console.log(el.style.top)
            if ((window.pageYOffset*100/(height-window.innerHeight))>80){
                if (el.blog_active<el.blogs.length){
                    el.blog_active++
                    el.blogs[el.blog_active].active=true;
                }

            }
        });

    }
})
</script>
