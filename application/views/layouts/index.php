<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <title>Library</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--        <link rel="stylesheet" href="<= base_url() ?>assets/dist/css/font-awesome.min.css">-->
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/ionicons.min.css">
        <!-- Theme style -->

        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/datatables.min.css">

        <!--data table--> 




        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.css">

        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/rtl.css">

        <!--
                 HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
                 WARNING: Respond.js doesn't work if you view the page via file:// 
                [if lt IE 9]>
                    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
        <style>

            .numberCircle {


                color: #3c8dbc;
                text-align: center;

                font: 14px cairo, sans-serif;
            }

        </style>

    </head>

    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">توسيع</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">لوحة الادارة</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->


                            <!-- Notifications Menu -->

                            <!-- Tasks Menu -->

                            <!-- User Account Menu -->

                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header>




            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->


                    <!-- search form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">

                        <li>
                            <a href="<?php echo site_url(); ?>">
                                <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
                            </a>
                        </li>



                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>الأقسام الرئيسية</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                $get_main_section_via_id = '';

                                $i = 0;
                                $arr = ['case_law', 'saudi_regulations', 'models_and_contracts', 'searches_law_books'];
                                $result = get_main_section();
                                foreach ($result as $value) {
                                    ?>

                                    <li>
                                        <a href="<?php echo site_url('section'); ?>/<?php echo $arr[$i] ?>?section_id=<?php echo $value->section_id; ?>"><i class="fa fa-list-ul"></i>  <?php echo $value->section_name ?></a>
                                    </li>

                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>الكتب</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('book/add'); ?>"><i class="fa fa-plus"></i> اضافة</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('book/index'); ?>"><i class="fa fa-list-ul"></i> عرض الكتاب حسب الفرع</a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('book/serch_view'); ?>"><i class="fa fa-list-ul"></i> بحث عن كتاب</a>
                                </li>
                            </ul>
                        </li>












                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>القسم</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('section/add'); ?>"><i class="fa fa-plus"></i> اضافة</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('section/index'); ?>"><i class="fa fa-list-ul"></i> عرض</a>
                                </li>
                            </ul>
                        </li>
                        <!--						<li>
                                                    <a href="#">
                                                        <i class="fa fa-desktop"></i> <span>الوسم</span>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                                                        <li class="active">
                                                            <a href=""><i class="fa fa-plus"></i> اضافة</a>
                                                        </li>
                                                                                        <li>
                                                            <a href="<php echo site_url('tag/index');?>"><i class="fa fa-list-ul"></i> عرض</a>
                                                        </li>
                                                                                </ul>
                                                </li>-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        نظام  المكتبة الإلكترونية

                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">



                    <?= $content_for_layout ?>

                    <?= $this->layout->block('book_view') ?>

                    <?= $this->layout->block() ?>

                    <?= $this->layout->block('book_add_view') ?>

                    <?= $this->layout->block() ?>

                    <?= $this->layout->block('book_edit_view') ?>

                    <?= $this->layout->block() ?>


                    <?= $this->layout->block('tag_add_view') ?>
                    <?= $this->layout->block('') ?>

                    <?= $this->layout->block('tag_edit_view') ?>
                    <?= $this->layout->block('') ?>


                    <?= $this->layout->block('tag_view') ?>
                    <?= $this->layout->block('') ?>


                    <?= $this->layout->block('section_add_view') ?>
                    <?= $this->layout->block('') ?>

                    <?= $this->layout->block('section_edit_view') ?>
                    <?= $this->layout->block('') ?>


                    <?= $this->layout->block('section_view') ?>
                    <?= $this->layout->block('') ?>


                    <?= $this->layout->block('tag_view_d') ?>
                    <?= $this->layout->block('') ?>


                    <?= $this->layout->block('search') ?>
                    <?= $this->layout->block('') ?>
                    <?= $this->layout->block('search_result') ?>
                    <?= $this->layout->block('') ?>
                    <?= $this->layout->block('search_via_section') ?>
                    <?= $this->layout->block('') ?>

                    <?= $this->layout->block('update_data_view') ?>
                    <?= $this->layout->block('') ?>

                    <?= $this->layout->block('case_law') ?>
                    <?= $this->layout->block('') ?>
                    <?= $this->layout->block('models_and_contracts') ?>
                    <?= $this->layout->block('') ?>

                    <?= $this->layout->block('saudi_regulations') ?>
                    <?= $this->layout->block('') ?>

                    <?= $this->layout->block('searches_law_books') ?>
                    <?= $this->layout->block('') ?>
                    <?= $this->layout->block('dashboard') ?>
                    <?= $this->layout->block('') ?>




                    <!-- Your Page Content Here -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">

                </div>
                <!-- Default to the left -->
                <strong>جميع الحقوق محفوظة &copy; 2020 <a href="#"></a>.</strong> 
            </footer>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->

        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/dist/js/app.min.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/datatables.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/treeview/css/bootstrap-treeview.min.css" />
        <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/treeview/js/bootstrap-treeview.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/bootstrap-tokenfield.min.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/calendar-system.css">


        <script src="<?= base_url() ?>assets/dist/js/bootstrap-tokenfield.js"></script>
        <!-- import the Jalali Date Class script -->


    </body>
</html>
