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
    <?php

// funcion para consultar en historico el id de usuario logueado y caso si esta activa para realizar la actualizacion
    function ConsultarHistorico($id, $caso) {
        $caso = 'se_activa_' . $caso;
        $resultado = Historico::model()->findByAttributes(array('id_usuario' => $id, $caso => true));

        return !empty($resultado) ? true : false;
    }

//
    function ExisteHistorico($id) {
        $resultado = Historico::model()->findByAttributes(array('id_usuario' => $id));
        return !empty($resultado) ? false : true;
    }
    ?>
    <?php
    $rol = Yii::app()->db->createCommand('select itemname from cruge_authassignment where userid = ' . Yii::app()->user->id)->queryAll();
     
    if($rol==NULL){
    $this->redirect(array('/cruge/ui/login'));
      
    } else {
    
        
    $rol = (object) $rol[0];
    $roll = $rol->itemname;
?>


        <body>
            <section id="container">
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
                        filter: progidXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
                    'fixed' => true,
                    'fluid' => true,
                    'items' => array(
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'items' => array(
                                array(
                                    'label' => 'Administrar Usuarios',
                                    'icon' => 'list white',
                                    'visible' => Yii::app()->user->checkAccess('administrador_tecnologia') || Yii::app()->user->checkAccess('super_administrador') || Yii::app()->user->checkAccess('administrador_mrl') || Yii::app()->user->checkAccess('administrador_actualizacion'),
                                    'items' => array(
                                        array('label' => 'Listar', 'url' => Yii::app()->user->ui->userManagementAdminUrl),
                                        array('label' => 'Crear Usuario', 'url' => $this->createUrl('/cruge/ui/usermanagementcreate')),
                                        array('label' => 'Asignar Roles', 'url' => $this->createUrl('/cruge/ui/rbacusersassignments')),
                                    )
                                ),
//                                array('label' => 'Actualización', 'icon' => 'pencil', 'url' => array('/personal/create'), 'visible' => ExisteHistorico(Yii::app()->user->id)),
                                array('label' => 'Listado Usuarios Actualización','icon' => 'list white', 'url' => array('/vswUsuariosActualizados/admin'),'visible' => Yii::app()->user->checkAccess('administrador_actualizacion')),
                                array(
                                    'label' => 'Actualización',
                                    'icon' => 'pencil',
                                    'visible' => Yii::app()->user->checkAccess('usuario_general'),
                                    'items' => array(
                                        array('label' => 'Personal', 'url' => $this->createUrl('/personal/createActualizar'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 1)),
                                        array('label' => 'Estudio', 'url' => $this->createUrl('/educacion/createActualizarEstudio'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 2)),
                                        array('label' => 'Familiar', 'url' => $this->createUrl('/familiar/createActualizarFamilia'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 3)),
                                    )
                                ),
                                   array(
                                    'label' => 'Simcla',
                                    'icon' => 'list white',
                                    'visible' => Yii::app()->user->checkAccess('registro_mrl')|| Yii::app()->user->checkAccess('administrador_tecnologia')||Yii::app()->user->checkAccess('rrhh_mrl_verificacion') ,
                                    'items' => array(
                                        array('label' => 'Evaluación', 'url' => array('/evaluacion/admin'),'visible' => Yii::app()->user->checkAccess('registro_mrl')),
                                        array('label' => 'Verificación RRHH', 'url' => array('/evaluacion/recursoshumanos'),'visible' => Yii::app()->user->checkAccess('rrhh_mrl_verificacion')),
                                        array('label' => 'Cierre de Semestre', 'url' => array('/evaluacion/rrhh_cierre'),'visible' => Yii::app()->user->checkAccess('administrador_mrl'), 'itemOptions' => array('style' => 'background-color: #d93a3a; color: #FFF;')),
                                    )
                                ),
                                
                                array(
                                    'label' => 'Simap',
                                    'icon' => 'glyphicon glyphicon-folder-open white',
                                    'visible' => Yii::app()->user->checkAccess('administrador_tecnologia'),
                                    'url' => array('proyecto/index')
                                    
                                ),
                                
                                array(
                                    'label' => 'Gráficas',
                                    'icon' => 'signal',
                                    'visible' => Yii::app()->user->checkAccess('registro_mrl')|| Yii::app()->user->checkAccess('administrador_tecnologia')||Yii::app()->user->checkAccess('rrhh_mrl_verificacion') ,
                                    'items' => array(
                                        array('label' => 'Estatus', 'url' => array('/graficas/graficarecepcion')),
//                                        array('label' => 'Rechazados', 'url' => array('/graficas/graficanacionalidad')),
//                                        array('label' => 'Odis', 'url' => array('/graficas/graficaodis')),
                                    )
                                ),
                                array(
                                    'label' => 'Reportes', 
                                   'icon' => 'glyphicon glyphicon-search', 
                                    'visible' => Yii::app()->user->checkAccess('administrador_tecnologia')||Yii::app()->user->checkAccess('rrhh_mrl_verificacion') ,
                                    'items' => array(
                                        array('label' => 'Reporte Final', 'url' => array('/vswReporteFinal/reporte')),
                                        array('label' => 'Rechazados', 'url' => array('/evaluacion/Reporte_Rechazados'), 'visible' => Yii::app()->user->checkAccess('administrador_tecnologia') || Yii::app()->user->checkAccess('rrhh_mrl_verificacion')),
//                                        array('label' => 'Odis', 'url' => array('/graficas/graficaodis')),
                                    )
                                ),
                                
                                                               
                                    array(
                                    'label' => 'Cambiar Contraseña',
                                    'icon' => 'wrench',
                                    'items' => array(
                                    array('label' => 'Cambiar Contraseña', 'url' => $this->createUrl('/cruge/ui/UserManagementUpdate_1/cc/a/id/'. Yii::app()->user->id)),
                                    )
                                ),
  
                                
                                
                                array(
                                    'label' => 'Salir (' . Yii::app()->user->name . ')', 
                                    'url' => Yii::app()->user->ui->logoutUrl, 
                                    'visible' => !Yii::app()->user->isGuest),
                            ),
                        )
                    )
                        )
                );
                
                
                
                
//            } 
//            else if (Yii::app()->user->checkAccess('super_administrador')) {
//                $this->widget(
//                        'booster.widgets.TbNavbar', array(
//                    'type' => 'inverse',
//                    'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
//                    'brandUrl' => array('/site/index'),
//                    'htmlOptions' => array(
//                        'style' => "background: #47abff; /* Old browsers */
//                                               background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
//                                               background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
//                                               background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
//                                               background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
//                                               background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
//                                               background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
//                                               filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
//                    'fixed' => true,
//                    'fluid' => true,
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array(
//                                    'label' => 'Administrar Usuarios',
//                                    'icon' => 'list white',
//                                    'items' => array(
//                                        array('label' => 'Listar', 'url' => Yii::app()->user->ui->userManagementAdminUrl),
//                                        array('label' => 'Crear Usuario', 'url' => $this->createUrl('/cruge/ui/usermanagementcreate')),
//                                        array('label' => 'Asignar Roles', 'url' => $this->createUrl('/cruge/ui/rbacusersassignments')),
//                                    )
//                                ),
//                                array('label' => 'Inicia Sessión'
//                                    , 'url' => Yii::app()->user->ui->loginUrl
//                                    , 'icon' => 'glyphicon glyphicon-user'
//                                    , 'visible' => Yii::app()->user->isGuest),
//                                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => Yii::app()->user->ui->logoutUrl, 'visible' => !Yii::app()->user->isGuest),
//                            ),
//                        )
//                    )
//                        )
//                );
//            } 
//            else if ($roll == 'administrador_mrl') { // ADMINISTRADOR DE LA MRL (ODI)
//                $this->widget(
//                        'booster.widgets.TbNavbar', array(
//                    'type' => 'inverse',
//                    'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
//                    'brandUrl' => array('/site/index'),
//                    'htmlOptions' => array(
//                        'style' => "background: #47abff; /* Old browsers */
//                    background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
//                    background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
//                    background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
//                    background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
//                    background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
//                    background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
//                    filter: progidXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
//                    'fixed' => true,
//                    'fluid' => true,
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array(
//                                    'label' => 'Administrar Usuarios',
//                                    'icon' => 'list white',
//                                    'visible' => Yii::app()->user->checkAccess('administrador_mrl'),
//                                    'items' => array(
//                                        array('label' => 'Listar', 'url' => Yii::app()->user->ui->userManagementAdminUrl),
//                                        array('label' => 'Crear Usuario', 'url' => $this->createUrl('/cruge/ui/usermanagementcreate')),
//                                        array('label' => 'Asignar Roles', 'url' => $this->createUrl('/cruge/ui/rbacusersassignments')),
//                                    )
//                                ),
//                                array(
//                                    'label' => 'Simcla',
//                                    'icon' => 'list white',
//                                    'url' => array('/evaluacion/admin'),
//                                ),
//                                array(
//                                    'label' => 'Salir (' . Yii::app()->user->name . ')', 
//                                    'url' => Yii::app()->user->ui->logoutUrl, 
//                                    'visible' => !Yii::app()->user->isGuest),
//                            ),)
//                    )
//                        )
//                        
//                );
//            } 
//            else 
//            if ($roll == 'administrador_actualizacion') { // ADMINISTRADOR DE ACTUALIZACION
//                $this->widget(
//                        'booster.widgets.TbNavbar', array(
//                    'type' => 'inverse',
//                    'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
//                    'brandUrl' => array('/site/index'),
//                    'htmlOptions' => array(
//                        'style' => "background: #47abff; /* Old browsers */
//                                               background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
//                                               background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
//                                               background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
//                                               background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
//                                               background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
//                                               background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
//                                               filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
//                    'fixed' => true,
//                    'fluid' => true,
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array('label' => 'Actualización',  'icon' => 'pencil', 'url' => array('/personal/create'), 'visible' => ExisteHistorico(Yii::app()->user->id)),
//                                array('label' => 'Listado Usuarios','icon' => 'list white', 'url' => array('/vswUsuariosActualizados/admin')),
//                                array(
//                                    'label' => 'Actualizacion',
//                                    'icon' => 'pencil',
//                                    'visible' => !ExisteHistorico(Yii::app()->user->id),
//                                    'items' => array(
//                                        array('label' => 'Personal', 'url' => $this->createUrl('/personal/createActualizar'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 1)),
//                                        array('label' => 'Estudio', 'url' => $this->createUrl('/educacion/createActualizarEstudio'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 2)),
//                                        array('label' => 'Familiar', 'url' => $this->createUrl('/familiar/createActualizarFamilia'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 3)),
//                                    )
//                                ),
//                                array(
//                                    'label' => 'Administrar Usuarios',
//                                    'icon' => 'list white',
//                                    'items' => array(
//                                        array('label' => 'Listar', 'url' => Yii::app()->user->ui->userManagementAdminUrl),
//                                        array('label' => 'Asignar Roles', 'url' => $this->createUrl('/cruge/ui/rbacusersassignments')),
//                                    )
//                                ),
//                                array('label' => 'Inicia Sessión'
//                                    , 'url' => Yii::app()->user->ui->loginUrl
//                                    , 'icon' => 'glyphicon glyphicon-user'
//                                    , 'visible' => Yii::app()->user->isGuest),
//                                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => Yii::app()->user->ui->logoutUrl, 'visible' => !Yii::app()->user->isGuest),
//                            ),
//                        )
//                    )
//                        )
//                );
//            } 
//            else if (Yii::app()->user->checkAccess('usuario_general')) {
//                $this->widget(
//                        'booster.widgets.TbNavbar', array(
//                    'type' => 'inverse',
//                    'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
//                    'brandUrl' => array('/site/index'),
//                    'htmlOptions' => array(
//                        'style' => "background: #47abff; /* Old browsers */
//                                               background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
//                                               background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
//                                               background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
//                                               background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
//                                               background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
//                                               background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
//                                               filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
//                    'fixed' => true,
//                    'fluid' => true,
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array('label' => 'Actualización',   'icon' => 'pencil', 'url' => array('/personal/create'), 'visible' => ExisteHistorico(Yii::app()->user->id)),
//                                array(
//                                    'label' => 'Actualización',
//                                      'icon' => 'pencil',
//                                    'visible' => !ExisteHistorico(Yii::app()->user->id),
//                                    'items' => array(
//                                        array('label' => 'Personal', 'url' => $this->createUrl('/personal/createActualizar'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 1)),
//                                        array('label' => 'Estudio', 'url' => $this->createUrl('/educacion/createActualizarEstudio'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 2)),
//                                        array('label' => 'Familiar', 'url' => $this->createUrl('/familiar/createActualizarFamilia'), 'visible' => ConsultarHistorico(Yii::app()->user->id, 3)),
//                                    )
//                                ),
//                                array('label' => 'Inicia Sessión'
//                                    , 'url' => Yii::app()->user->ui->loginUrl
//                                    , 'icon' => 'glyphicon glyphicon-user'
//                                    , 'visible' => Yii::app()->user->isGuest),
//                                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => Yii::app()->user->ui->logoutUrl, 'visible' => !Yii::app()->user->isGuest),
////                                array('label' => 'Persona', 'url' => array('/evaluacion/create')),
//                            ),
//                        )
//                    )
//                        )
//                );
//            }
//            else if ($roll == 'registro_mrl') { // ADMINISTRADOR DE LA MRL (ODI)
//                $this->widget(
//                        'booster.widgets.TbNavbar', array(
//                    'type' => 'inverse',
//                    'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
//                    'brandUrl' => array('/site/index'),
//                    'htmlOptions' => array(
//                    'style' => "background: #47abff; /* Old browsers */
//                    background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
//                    background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
//                    background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
//                    background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
//                    background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
//                    background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
//                    filter: progidXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
//                    'fixed' => true,
//                    'fluid' => true,
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array(
//                                    'label' => 'Simcla',
//                                    'icon' => 'list white',
//                                    'url' => array('/evaluacion/admin'),
//                                ),
//                                array(
//                                    'label' => 'Salir (' . Yii::app()->user->name . ')',
//                                    'url' => Yii::app()->user->ui->logoutUrl,
//                                    'visible' => !Yii::app()->user->isGuest),
//                            )
//                        ),
//                    )
//                        )
//                );
//            }
//            else if ($roll == 'rrhh_mrl_verificacion') { // RRHH VERIFICADOR DE LOS OBJETIVOS DE LA MRL (ODI)
//                $this->widget(
//                        'booster.widgets.TbNavbar', array(
//                    'type' => 'inverse',
//                    'brand' => CHtml::image(Yii::app()->getBaseUrl() . '/img/minmujer6.png', 'Logo', array('width' => '140', 'height' => '32')),
//                    'brandUrl' => array('/site/index'),
//                    'htmlOptions' => array(
//                        'style' => "background: #47abff; /* Old browsers */
//                        background: -moz-linear-gradient(top, #47abff 1%, #3d89c9 27%); /* FF3.6+ */
//                        background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#47abff), color-stop(27%,#3d89c9)); /* Chrome,Safari4+ */
//                        background: -webkit-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Chrome10+,Safari5.1+ */
//                        background: -o-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* Opera 11.10+ */
//                        background: -ms-linear-gradient(top, #47abff 1%,#3d89c9 27%); /* IE10+ */
//                        background: linear-gradient(to bottom, #47abff 1%,#3d89c9 27%); /* W3C */
//                        filter: progidXImageTransform.Microsoft.gradient( startColorstr='#47abff', endColorstr='#3d89c9',GradientType=0 ); /* IE6-9 */ !important;"),
//                    'fixed' => true,
//                    'fluid' => true,
//                    'items' => array(
//                        array(
//                            'class' => 'booster.widgets.TbMenu',
//                            'type' => 'navbar',
//                            'items' => array(
//                                array(
//                                    'label' => 'Simcla',
//                                    'icon' => 'list white',
//                                    'url' => array('/evaluacion/recursoshumanos'),
//                                ),
//                                array(
//                                    'label' => 'Salir (' . Yii::app()->user->name . ')',
//                                    'url' => Yii::app()->user->ui->logoutUrl,
//                                    'visible' => !Yii::app()->user->isGuest),
//                            )
//                        ),
//                    )
//                        )
//                );
//            }
            ?>
                <section id="main-content">
                <section class="wrapper">
                    <!--mini statistics start-->
                    <?php echo $content; ?>
                    <!--mini statistics end-->
                </section>
            </section>

            <div id="expirado"></div>

            <!--            <footer class='container col-md-12 col-xs-12 text-center'>
                            Copyright &copy; <?php // echo date('Y');                  ?> by My Company.<br/>
                            All Rights Reserved.<br/>
            <?php // echo Yii::powered(); ?>
                        </footer>-->
            <!-- footer -->
        </section>
            <?php //echo $content; ?>
                
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
                <div class="container-fluid" style="background-color: #8ac3f4">
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
            <div id="expirado"></div>
        </div><!-- page -->
    </body>
</html>
<?php
$url_redirect = CHtml::normalizeUrl(array('/cruge/ui/login'));
$url_valida_sesion = CHtml::normalizeUrl(array('/cruge/ui/login'));
$url_destroy_session = CHtml::normalizeUrl(array('/site/logout'));
Yii::app()->getClientScript()->registerScript("core_cruge", "
var tstampActual = 0;
var comprobar = 180000;
        
    function kill_session() {
        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }else{// code for IE6, IE5
            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.open('GET','$url_destroy_session',false);
        xmlhttp.send();

        document.getElementById('expirado').innerHTML=xmlhttp.responseText;
        document.location.href = '$url_redirect';
   
    }      

function actividad() {

    var tstamp = new Date().getTime();
    
    if (Math.abs(tstampActual - tstamp) > comprobar) {
        kill_session();  
    }
}

$( document ).ready(function() {
    // Handler for .ready() called.
    document.body.addEventListener('mousemove', function() {
    tstampActual = new Date().getTime(); 
    }, false);
    setInterval(function() {actividad()}, comprobar);
});

        ", CClientScript::POS_LOAD);
    }
?>



