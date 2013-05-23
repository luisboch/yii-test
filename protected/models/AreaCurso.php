<?php

/**
 * This is the model class for table "area_curso".
 *
 * The followings are the available columns in table 'area_curso':
 * @property integer $id
 * @property string $nome
 * @property string $data_criacao
 *
 * The followings are the available model relations:
 * @property Curso[] $cursos
 */
class AreaCurso extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AreaCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'area_curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, data_criacao', 'required'),
			array('nome', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, data_criacao', 'safe', 'on'=>'search'),
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
			'cursos' => array(self::HAS_MANY, 'Curso', 'areacurso_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'data_criacao' => 'Data Criacao',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('data_criacao',$this->data_criacao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}