<?php
$this->breadcrumbs = array(
    'Poas' => array('index'),
    $model->id_poa,
);
<<<<<<< HEAD
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
=======


$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'personal-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
<<<<<<< HEAD
function FechaActual($id, $tiempo_hora) { // FUNCIÓN PARA PODER AÑADIR CANTIDADES CUMPLIDAS SEGUN LA FECHA ACTUAL
    $tiempo_hora2 = date('m'); // FECHA ACTUAL DEL SERVIDOR
=======


function FechaActual($id, $tiempo_hora) { // FUNCIÓN PARA PODER AÑADIR CANTIDADES CUMPLIDAS SEGUN LA FECHA ACTUAL


    $tiempo_hora2 = date('m'); // FECHA ACTUAL DEL SERVIDOR


>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
    if ($tiempo_hora2 == 01) {
        $time = 57;
    }
    if ($tiempo_hora2 == 02) {
        $time = 58;
    }
    if ($tiempo_hora2 == 03) {
        $time = 59;
    }
    if ($tiempo_hora2 == 04) {
        $time = 60;
    }
    if ($tiempo_hora2 == 05) {
        $time = 61;
    }
    if ($tiempo_hora2 == 06) {
        $time = 62;
    }
    if ($tiempo_hora2 == 07) {
        $time = 63;
    }
    if ($tiempo_hora2 == 08) {
        $time = 64;
    }
    if ($tiempo_hora2 == 09) {
        $time = 65;
    }
    if ($tiempo_hora2 == 10) {
        $time = 66;
    }
    if ($tiempo_hora2 == 11) {
        $time = 67;
    }
    if ($tiempo_hora2 == 12) {
        $time = 68;
    }
<<<<<<< HEAD
    if ($tiempo_hora != $time) {
=======

    if ($tiempo_hora != $time) {

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
        $id = 'aprobado';
    }
    return $id;
}
?>

<style>
    .aprobado
    {
        visibility: hidden;
    }
</style>


    <div class="span-20 poa_content">

        <?php
        $consulta11 = Poa::model()->findByAttributes(array('id_poa' => $model->id_poa));
        $nombreProyectoo = $consulta11['nombre'];
        ?>
        <div class="progress right">
            <div class="progress-bar progress-bar-success" data-transitiongoal="100" style="width: 100%;" aria-valuenow="95"></div>
        </div>
        <h2 style="text-align: center; font-size: 20px;"><b>Proyecto:</b> <?php echo $nombreProyectoo ?> </h2>

        <br>


        <div class="col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <div class="panel-body">

                    <!--GRID VIEW DE ACCIONES DE PROYECTO-->

                    <?php
                    $consulta1 = Poa::model()->findByAttributes(array('id_poa' => $model->id_poa));
                    $nombreProyecto = $consulta1['nombre'];
                    $this->widget(
                            'booster.widgets.TbBadge', array(
                        'context' => 'success',
                        'htmlOptions' => array(
                            'style' => 'font-size:17px;',
                        ),
                        'label' => ' ' . $nombreProyecto,
                            )
                    );
                    ?>


                    <?php
//        #########################      GRID VIEW DE ACCIONES DE PROYECTO    ##########################
<<<<<<< HEAD
=======

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
                    $this->widget('booster.widgets.TbExtendedGridView', array(
                        'type' => 'striped bordered',
                        'htmlOptions' => array('style' => 'margin-bottom: 40px;;'),
                        'dataProvider' => $accion->searchAccion($id_poa),
                        'template' => "{items}",
                        'columns' => array_merge(array(
                            array(
                                'name' => 'nombre_accion',
                                'header' => 'Acción',
                                'value' => '$data->nombre_accion',
                            ),
                            'bien_servicio' => array(
                                'name' => 'bien_servicio',
                                'header' => 'Bien o Servicio',
                                'value' => '$data->bien_servicio'
                            ),
                            'fk_unidad_medida' => array(
                                'name' => 'fk_unidad_medida',
                                'header' => 'Unidad de Medida',
                                'value' => '$data->search_unidad_medida($data->id_accion)'
                            ),
                            'cantidad' => array(
                                'name' => 'cantidad',
                                'header' => 'Cantidad',
                                'value' => '$data->cantidad'
                            ),
                            array(
                                'class' => 'booster.widgets.TbButtonColumn',
                                'header' => 'Desplegar Acciones',
                                'template' => '{accion}',
                                'buttons' => array(
                                    'accion' => array(
                                        'label' => 'Acciones',
                                        'icon' => 'chevron-down',
                                        'size' => 'medium',
                                        'url' => 'Yii::app()->createUrl("/poa/Rendimiento", array("id_accion"=>$data->id_accion, "nombre_accion"=>$data->nombre_accion,  "id_poa"=>' . $id_poa . '))',
                                    ),
                                ),
                            ),
                        )),
                    ));
                    ?>
                </div>
            </div>
            <?php
            if (isset($_GET['id_accion'])) {
                ?>

                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">



                        <?php
                        $consulta2 = Acciones::model()->findByAttributes(array('id_accion' => $_GET['id_accion']));
                        $nombreAccion = $consulta2['nombre_accion'];
<<<<<<< HEAD
=======

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
                        $this->widget(
                                'booster.widgets.TbBadge', array(
                            'context' => 'success',
                            'htmlOptions' => array(
                                'style' => 'font-size:17px;',
                            ),
                            'label' => ' ' . $nombreAccion,
                                )
                        );
                        ?>



                        <?php
                        //        #########################      GRID VIEW DE RENDIMIENTO DE ACCIONES DE PROYECTO  ##########################
                        $this->widget('booster.widgets.TbExtendedGridView', array(
                            'type' => 'striped bordered condensed',
                            'id' => 'RendimientoGrid',
                            'dataProvider' => new CActiveDataProvider('Rendimiento', array(
                                'criteria' => array(
                                    'order' => 'fk_meses ASC',
                                    'condition' => 'id_entidad=' . $_GET['id_accion'] . ' and fk_tipo_entidad = 73 ',
                                ),
                                'pagination' => array('pageSize' => Yii::app()->user->getState('pageSize', 12),),
                                    )),
                            'columns' => array(
                                array(
                                    'name' => 'fk_meses',
                                    'header' => 'Mes',
                                    'value' => '$data->fkMeses->descripcion',
                                    'htmlOptions' => array('width' => '95px'),
                                ),
                                array(
                                    'name' => 'cantidad_programada',
                                    'header' => 'Cantidad Programada',
                                    'htmlOptions' => array('width' => '95px'),
                                    'visible' => '$data->cantidad_programada'
                                ),
                                array(
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'cssClassExpression' => 'FechaActual($data["cantidad_cumplida"],$data->fk_meses)',
                                    'name' => 'cantidad_cumplida',
                                    'header' => 'Cantidad Cumplida',
                                    'htmlOptions' => array('style' => 'text-align:center', 'title' => 'Indique la cantidad cumplida', 'id' => 'editable'),
                                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                                    'editable' => array(
                                        'type' => 'text',
                                        'emptytext' => 'Indique la cantidad cumplida',
                                        'url' => $this->createUrl('Poa/ActualizarCantidadCumplida'),
                                        'placement' => 'left',
                                    )
                                ),
                                array(
                                    'header' => 'Cantidades Cumplidas',
                                    'name' => 'cantidad_cumplida',
                                    'headerHtmlOptions' => array('style' => 'width: 5%;'),
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
                <!--                <div class="progress right">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="100" style="width: 100%;" aria-valuenow="95"></div>
                                </div>-->
                <div class="progress right">
                    <div class="progress-bar progress-bar-success" data-transitiongoal="100" style="width: 100%;" aria-valuenow="50"></div>
                </div>
                <h2 style="text-align: center; font-size: 20px;"><b>ACTIVIDADES</b> </h2>


                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">



                        <?php
                        $this->widget(
                                'booster.widgets.TbBadge', array(
                            'context' => 'success',
                            'htmlOptions' => array(
                                'style' => 'font-size:17px;',
                            ),
                            'label' => 'Actividades de la acción: ' . $nombreAccion,
                                )
                        );
<<<<<<< HEAD
//              ####################       GRID VIEW DE ACTIVIDADES DE PROYECTO          #####################
=======

//              ####################       GRID VIEW DE ACTIVIDADES DE PROYECTO          #####################

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
                        $this->widget('booster.widgets.TbExtendedGridView', array(
                            'type' => 'striped bordered condensed',
                            'id' => 'ActividadesGrid',
                            'dataProvider' => new CActiveDataProvider('Actividades', array(
                                'criteria' => array(
                                    'order' => 'id_actividades ASC',
                                    'condition' => 'fk_accion=' . $_GET['id_accion'],
                                ),
                                'pagination' => array('pageSize' => Yii::app()->user->getState('pageSize', 12),),
                                    )),
                            'columns' => array(
                                array(
                                    'name' => 'actividad',
                                    'header' => 'Nombre Actividad',
                                    'htmlOptions' => array('width' => '95px'),
                                ),
                                array(
                                    'name' => 'fk_unidad_medida',
                                    'header' => 'Unidad de Medida',
                                    'value' => '$data->fkUnidadMedida->descripcion',
                                    'htmlOptions' => array('width' => '95px'),
                                ),
                                array(
                                    'name' => 'cantidad',
                                    'header' => 'Cantidad',
                                    'htmlOptions' => array('width' => '95px'),
                                ),
                                array(
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'header' => 'Desplegar Actividades',
                                    'template' => '{actividad}',
                                    'buttons' => array(
                                        'actividad' => array(
                                            'label' => 'Actividades',
                                            'icon' => 'chevron-down',
                                            'size' => 'medium',
                                            'url' => 'Yii::app()->createUrl("/poa/Rendimiento", array("id_actividades"=>$data->id_actividades, "id_accion"=>' . $_GET['id_accion'] . ',  "id_poa"=>' . $id_poa . '))',
                                        ),
                                    ),
                                ),
                            ),
                        ));
                    }
                    ?>
                </div>
            </div>

            <?php
            if (isset($_GET['id_actividades'])) {
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">

                        <?php
                        $consulta3 = Actividades::model()->findByAttributes(array('id_actividades' => $_GET['id_actividades']));
                        $nombreActividad = $consulta3['actividad'];
<<<<<<< HEAD
=======

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
                        $this->widget(
                                'booster.widgets.TbBadge', array(
                            'context' => 'success',
                            'htmlOptions' => array(
                                'style' => 'font-size:17px;',
                            ),
                            'label' => '' . $nombreActividad,
                                )
                        );
                        ?>



                        <?php
//        #########################      GRID VIEW DE RENDIMIENTO DE ACTIVIDADES DE PROYECTO  ##########################
<<<<<<< HEAD
=======

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
                        $this->widget('booster.widgets.TbExtendedGridView', array(
                            'type' => 'striped bordered condensed',
                            'id' => 'RendimientoGrid',
                            'dataProvider' => new CActiveDataProvider('Rendimiento', array(
                                'criteria' => array(
                                    'order' => 'fk_meses ASC',
                                    'condition' => 'id_entidad=' . $_GET['id_actividades'] . ' and fk_tipo_entidad = 74 ',
                                ),
                                'pagination' => array('pageSize' => Yii::app()->user->getState('pageSize', 12),),
                                    )),
                            'columns' => array(
                                array(
                                    'name' => 'fk_meses',
                                    'header' => 'Mes',
                                    'value' => '$data->fkMeses->descripcion',
                                    'htmlOptions' => array('width' => '95px'),
                                ),
                                array(
                                    'name' => 'cantidad_programada',
                                    'header' => 'Cantidad Programada',
                                    'htmlOptions' => array('width' => '95px'),
                                    'visible' => '$data->cantidad_programada'
                                ),
                                array(
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'cssClassExpression' => 'FechaActual($data["cantidad_cumplida"],$data->fk_meses)',
                                    'name' => 'cantidad_cumplida',
                                    'header' => 'Cantidad Cumplida',
                                    'htmlOptions' => array('style' => 'text-align:center', 'title' => 'Indique la cantidad cumplida', 'id' => 'editable'),
                                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                                    'editable' => array(
                                        'type' => 'text',
                                        'emptytext' => 'Indique la cantidad cumplida',
                                        'url' => $this->createUrl('Poa/ActualizarCantidadCumplida'),
                                        'placement' => 'left',
                                    )
                                ),
                                array(
                                    'header' => 'Cantidades Cumplidas',
                                    'name' => 'cantidad_cumplida',
                                    'headerHtmlOptions' => array('style' => 'width: 5%;'),
                                ),
                            ),
                        ));
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>





<<<<<<< HEAD
<?php $this->endWidget(); ?>
=======
<?php $this->endWidget(); ?>

>>>>>>> 8e9418485ea9cd441f7866e55a81d0d9f3d7cece
