<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Encuesta por voz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/fontello.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/animate.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/_apps/voicesurvey/css/icons.css" />

    <style media="screen">
    body{
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    </style>

</head>

<body>
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
                    </div>
                    <div :style="'display:'+((question.question_type_id==1)?'inherit':'none')"  class="button_mic icobutton" id="button_mic" v-on:mousedown="startRecording()" v-on:mouseup="stopRecording()" v-on:touchstart="startRecording()" v-on:touchend="stopRecording()">
                        <span class="icon-mic"></span>
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
    <script type="text/javascript">
        var data = '<?php echo print_r($list,true);?>';
        var base_url = '<?php echo base_url(); ?>';
        data = JSON.parse(data);
    </script>
    <script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/app.js"></script>

    <script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/mo.min.js"></script>
    <script src="<?php echo base_url(); ?>source/_apps/voicesurvey/js/demo.js"></script>
</html>
