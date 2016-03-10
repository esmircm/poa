<?php

/**
 * This is the model class for table "poa.rendimiento".
 *
 * The followings are the available columns in table 'poa.rendimiento':
 * @property integer $id_rendimiento
 * @property integer $fk_meses
 * @property integer $fk_actividad
 * @property integer $created_by
 * @property string $created_date
 * @property integer $modified_by
 * @property string $modified_date
 * @property integer $fk_status
 * @property boolean $es_activo
 * @property integer $cantidad_cumplida
 *
 * The followings are the available model relations:
 * @property Actividades $fkActividad
 * @property Maestro $fkMeses
 * @property Maestro $fkStatus
 */
class Rendimiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'poa.rendimiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_meses, fk_actividad, created_by, created_date, modified_date, fk_status, cantidad_cumplida', 'required'),
			array('fk_meses, fk_actividad, created_by, modified_by, fk_status, cantidad_cumplida', 'numerical', 'integerOnly'=>true),
			array('es_activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rendimiento, fk_meses, fk_actividad, created_by, created_date, modified_by, modified_date, fk_status, es_activo, cantidad_cumplida', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'fkActividad' => array(self::BELONGS_TO, 'Actividades', 'fk_actividad'),
			'fkMeses' => array(self::BELONGS_TO, 'Maestro', 'fk_meses'),
			'fkStatus' => array(self::BELONGS_TO, 'Maestro', 'fk_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rendimiento' => 'Id Rendimiento',
			'fk_meses' => 'Fk Meses',
			'fk_actividad' => 'Fk Actividad',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'modified_by' => 'Modified By',
			'modified_date' => 'Modified Date',
			'fk_status' => 'Fk Status',
			'es_activo' => 'Es Activo',
			'cantidad_cumplida' => 'Cantidad Cumplida',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_rendimiento',$this->id_rendimiento);
		$criteria->compare('fk_meses',$this->fk_meses);
		$criteria->compare('fk_actividad',$this->fk_actividad);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('fk_status',$this->fk_status);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('cantidad_cumplida',$this->cantidad_cumplida);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rendimiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}