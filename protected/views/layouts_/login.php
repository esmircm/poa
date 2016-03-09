<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/minmujer-favicon.png"/> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="header">
            <?php
            echo CHtml::image(Yii::app()->request->baseUrl . '/img/banner.png', "this is alt tag of image", array("width" => "100%", "height" => "69px"));
            echo CHtml::image(Yii::app()->request->baseUrl . '/img/banner2.png', "this is alt tag of image", array("width" => "100%", "height" => "169px"));
            ?>
            <?php
            $this->widget(
                    'booster.widgets.TbNavbar', array(
                'type' => 'inverse',
                'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
                'brandUrl' => array('/site/index'),
                'htmlOptions' => array(
                    'style' => "background: #47abff; /* Old browsers */
                                               background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
                                               background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
                                               background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
                                               background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
                                               background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
                                               background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
                                               filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
                'fixed' => true,
                'fluid' => true,
                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'items' => array(
//                            array('label' => 'Inicia Sessión'
//                                , 'url' => Yii::app()->user->ui->loginUrl
//                                , 'icon' => 'glyphicon glyphicon-user'
//                                , 'visible' => Yii::app()->user->isGuest),
                            //array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => Yii::app()->user->ui->logoutUrl, 'visible' => !Yii::app()->user->isGuest),
                        ),
                    )
                )
                    )
            );
            ?>
        </div>
        <div class="container-fluid" style="margin-left: -2.7%; margin-bottom: 2%">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <?php echo $content; ?>
            </div>
            <div class="col-md-1"></div>
        </div>
        <footer class="footer">
            <div class="container-fluid" style="background-color:#1290ff">
                <div class="col-md-12 text-center" style="background-color: #1290ff">
                    <div class="col-md-7 text-left" style="background-color: #1290ff">
                        <h3 class="footer_logo" style="font-style:italic">Ministerio del Poder Popular Para la Mujer y la Igualdad de Género</h3>
                    </div><!--/row-->
                    <div class="col-md-5 text-right">
                        <nav class="navbar navbar-btn">
                            <ul>
                                <il style="vertical-align: middle;"><a href="https://www.facebook.com/minmujer" target="_blank"><img src="<?= Yii::app()->baseUrl . '/img/facebook.png' ?>" alt="faceboo.com" width="40" ismap></a></il>
                                <il style="vertical-align: middle;"><a href="https://twitter.com/minmujer" target="_blank"><img src="<?= Yii::app()->baseUrl . '/img/twitter.png' ?>" alt="twitter.com" width="40" ismap></a></il>
                                <il style="vertical-align: middle;"><a href="https://plus.google.com/+MinMujercprensaOficial/posts" target="_blank"><img src="<?= Yii::app()->baseUrl . '/img/google.png' ?>" alt="google.com" width="40" ismap></a></il>
                            </ul>
                    </div><!--/row-->
                </div><!--/row-->
            </div><!--/div-->
            <div class="container-fluid"  style="background-color: #8ac3f4">
                <div style="margin-bottom: 2%"></div>
                <div class="col-md-12">

                    <div class="col-md-10 text-center">
                        <b><center><p class="copy-left text-danger" style="color: white">&copy; <?php echo date('Y'); ?> Ministerio del Poder Popular para la Mujer y la Igualdad de Género. RIF G-20008830-3 </p></center>
                            <center><p class="text-danger" style="color: white">Este sistema esta realizado integramente en software libre dando fiel cumplimiento a la </center><u><em><a style="color: white" target="_blank" class="text-warning" href="http://www.cnti.gob.ve/images/stories/documentos_pdf/leydeinfogob.pdf"> Ley de InfoGobierno.</a></em></u></p></b>
                    </div>
                    <?php
                    if (Yii::app()->user->isGuest) {
                        ?>
                        <div class="col-md-1 text-left">
                            <a href="<?= Yii::app()->baseUrl . '/cruge/ui/login' ?>"><img src="<?= Yii::app()->baseUrl . '/img/login.png' ?>" alt="Ingresar" width="80"></img></a>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-12" style="margin-bottom: 1%"></div>
                </div><!--/div-->
            </div>
        </footer><!--/footer-->
        </div><!-- page -->
    </body>
</html>
