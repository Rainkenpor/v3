<?php
$this->load->helper('url');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- datetime -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>source/admin/css/jquery.datepicker.min.css">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>source/css/tag-basic-style.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Digital Age</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="https://cdn1.iconfinder.com/data/icons/navigation-elements/512/user-login-man-human-body-mobile-person-512.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Digital Age</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="https://cdn1.iconfinder.com/data/icons/navigation-elements/512/user-login-man-human-body-mobile-person-512.png" class="img-circle" alt="User Image">

                                    <p>
                                        Digital Age - Web Developer
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="./" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->

        <?php include('_slidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Digital Age
                    <small>Panel de control</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content" id="app">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- quick email widget -->
                        <div class="box box-info">
                            <div style="background-color:#00c0ef;padding:5px;color:white;font-size:16px">
                                {{blog_id?'Editando':'Nuevo'}}
                            </div>
                            <div class="box-header">
                                <i class="fa fa-comments"></i>
                                <h3 class="box-title">Blog</h3>
                            </div>
                            <div class="box-body">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        Título
                                        <input type="text" class="form-control" placeholder="Título" id="title" v-model="title">
                                    </div>
                                    <div class="form-group">
                                        Alias
                                        <input type="text" class="form-control" placeholder="Alias" id="alias" v-model="alias">
                                    </div>
                                    <div class="form-group">
                                        Autor
                                        <input type="text" class="form-control" placeholder="Autor" v-model="autor">
                                    </div>
                                    <div class="">
                                        <div class="">
                                            Portada
                                        </div>
                                        <input type="file" class="form-control" id="uploadimage" name="" value="">
                                    </div>
                                    <br>
                                    <div>
                                        <textarea name="name" id="textarea" rows="8" cols="80"></textarea>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div>Tags</div>
                                            <div id="tags" data-tags-input-name="tag"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div>Rango de Fechas</div>
                                            <input type="text" id="gmi-datepicker--input" style="margin-top:10px" class="gmi-input form-control" >
                                        </div>
                                        <div class="col-sm-3">
                                            <div>Tipo</div>
                                            <select class="form-control" v-model="blog_type" style="margin-top:8px">
                                                <option value="1">Blog</option>
                                                <option value="2">Modal</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <div>Prioridad</div>
                                            <div class="checkbox">
                                                    <input type="checkbox" id="priority">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div>URL (Iframe)</div>
                                            <input type="text" class="form-control" v-model="blog_iframe">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="box-footer clearfix">
                                <button type="button" class="pull-right btn btn-default" v-on:click="save()">Guardar <i class="fa fa-save"></i></button>
                                <button type="button" class="pull-right btn btn-default" v-on:click="clear()">Limpiar <i class="fa fa-clear"></i></button>
                                </div>
                            </div>

                        </section>
                        <!-- right col -->
                    </div>
                    <div class="row" >
                        <div class="col-sm-4 " v-for="item in items">
                            <div class="box box-info" style="padding:5px">
                            <div  v-if="item.is_priority==1" style="float:left;position:absolute;top:0;left:0;background-color:#F44336;color:white;padding:1px 20px;border-radius: 0  0 15px 0;font-size:12px">
                                Prioridad
                            </div>
                            <div style="float:right;position:absolute;top:0;right:0;padding:5px">
                                <span class="fa fa-pencil" style="cursor:pointer" v-on:click="edit(item)"></span>
                                <span class="fa fa-trash" style="margin-left:10px;cursor:pointer" v-on:click="remove(item)"></span>
                            </div>
                            <br>
                            <h4><b v-html="item.title"></b></h4>
                            <img :src="'<?php echo base_url(); ?>source/images/blog/'+item.cover+'_1000.jpg'" alt="" width="100%">
                            <small>{{item.start_date}} - {{item.end_date}}</small>
                            <div class="" style="height:200px; overflow:hidden" v-html="item.description">

                            </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.row (main row) -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- ./wrapper -->

        <script type="text/javascript">
            var base_url = "<?php echo base_url(); ?>";
        </script>

        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>


        <!-- CHKEDITOR -->
        <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>


        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>source/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>source/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>source/admin/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>source/admin/js/adminlte.min.js"></script>

        <script src="<?php echo base_url(); ?>source/js/tagging.js"></script>

        <script src="<?php echo base_url(); ?>source/admin/js/_blog.js"></script>



        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    </body>
    </html>
