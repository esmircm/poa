
<!--<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>-->
<?php // echo $form->hiddenField($evaluacion, 'id_evaluacion'); ?>

<div class="row">

    <div class='col-md-3'>
        <?php
        echo $form->textAreaGroup($preind, 'objetivo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5 limpiar'
        ))));
        ?>
    </div> 

    <div class='col-md-2'>
        <?php
        echo $form->textFieldGroup($preind, 'peso', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5 limpiar numeric', 'maxlength' => 2))));
        echo 'Peso Total Puntos 50';
        ?>
    </div> 

  
    <script type="text/javascript">
        //EVENTOS EN javascript


  
    </script>

    <div  style="margin-top: 28px; margin-left: -26px" >
        <!--        <a>-->
        <!--<a href="javascript:void(0)" onclick="DibujarObjetivo()"  >-->
            <img src="<?= Yii::app()->request->baseUrl ?>/img/mas.png" onclick="GuardarObjetivo()" />
            <!--<img src="<?= Yii::app()->request->baseUrl ?>/img/maskk.png">-->

        <!--</a>-->
        <!--</button>-->
    </div>
    <div   style="margin-top: -42px; margin-left: 840px">
        <h5> <left><b>Para Guardar y Agregar otro Objetivo Click en el Icono!</b> </left></h5>
    </div>
    <div  style="margin-top: -9px; margin-left: 840px">
        <h5> <left><b>Minimo de Objetivo 3 y Maximo 5. </b></left></h5>
        <h5> <left><b>El peso de los Objetivos es mínimo de 5 y máximo de 25.</b></left></h5>
    </div>
</div> 

