<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/dashboard.css" />

        <!-- archivos necesarios para bootstrap-calendar -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/bootstrap-calendar/css/calendar.css">
        <!-- fin archivos necesarios para bootstrap calendr -->

        <!-- archivos necesarios para datetime picker -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <!-- fin archivos necesarios para DateTimePicker -->


        <!-- scripts bootstrap-calendar -->       
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/jquery/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>     
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/bootstrap-calendar/js/language/es-ES.js"></script>
        <!-- fin scripts bootstrap-calendar -->

        <!-- scripts datetimepicker-->      
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/eonasdan-bootstrap-datetimepicker/bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
        <!-- scripts datetimepicker -->

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <!-- Nav Bar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">&nbsp; Gestión Clínicas</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp; Perfil <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo CHtml::link('Mantenedores', array('mantenedores/index')); ?></li>
                                <li><a href="#">Editar mis datos</a></li>
                            </ul>
                        </li>
                        <li><a href=""><span class="glyphicon glyphicon-off"></span>&nbsp; Cerrar Sesión</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li <?php echo (Yii::app()->params['moduloActivo'] == 'home') ? 'class="active"' : '' ?>>
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-home"></span>&nbsp; Inicio', '/GestionClinicas') ?>
                        </li>
                        <li <?php echo (Yii::app()->params['moduloActivo'] == 'Citas') ? 'class="active"' : '' ?>>
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-calendar"></span>&nbsp; Agenda', '/GestionClinicas/citas') ?>
                        </li>
                        <li <?php echo (Yii::app()->params['moduloActivo'] == 'atenciones') ? 'class="active"' : '' ?>>
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-plus-sign"></span>&nbsp; Atenciones', '/GestionClinicas/pacientes') ?>
                        </li>
                        <li <?php echo (Yii::app()->params['moduloActivo'] == 'Reportes') ? 'class="active"' : '' ?>>
                            <a href="#"><span class="glyphicon glyphicon-file"></span>&nbsp; Reportes</a>
                        </li> 
                        <li <?php echo (Yii::app()->params['moduloActivo'] == 'pacientes') ? 'class="active"' : '' ?>>
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-plus-sign"></span>&nbsp; Pacientes', '/GestionClinicas/pacientes') ?>
                        </li>
                        <li <?php echo (Yii::app()->params['moduloActivo'] == 'mantenedores') ? 'class="active"' : '' ?>>
                            <?php echo CHtml::link('<span class="glyphicon glyphicon-wrench"></span>&nbsp; Mantenedores', '/GestionClinicas/mantenedores') ?>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="row">
                        <!-- Breadcrumbs -->
                        <?php
                        if (Yii::app()->controller->route !== 'site/index') {

                            $this->breadcrumbs = array_merge(array(Yii::t('zii', 'Home') =>
                                Yii::app()->homeUrl), $this->breadcrumbs);

                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ol',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                                'htmlOptions' => array('class' => 'breadcrumb'),
                            ));
                        }
                        ?>
                        <!-- Fin Breadcrumbs -->
                        <?php echo $content; ?>
                    </div>
                    <hr>
                    <footer>
                        <p>Footer</p>
                    </footer>
                </div>
            </div>
        </div> 

        <!-- Scripts -->

        <!--<script type="text/javascript" src="<?php //echo Yii::app()->request->baseUrl; ?>/public/js/jquery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/holder.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/underscore/underscore-min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/bootstrap-calendar/js/calendar.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/moment/moment.js"></script>
        <!-- Fin Scripts -->

    </body>
</html>
