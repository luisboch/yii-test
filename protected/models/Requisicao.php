<?php

/**
 * This is the model class for table "requisicoes".
 *
 * The followings are the available columns in table 'requisicoes':
 * @property integer $id
 * @property string $titulo
 * @property string $descricao
 * @property integer $usuario_id
 * @property integer $criado_por
 * @property string $data_criacao
 * @property string $status
 * @property string $prioridade
 *
 * The followings are the available model relations:
 * @property RequisicoesIteracoes[] $requisicoesIteracoes
 * @property Usuarios $usuario
 * @property Usuarios $criadoPor
 */
class Requisicao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Requisicao the static model class
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
		return 'requisicoes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, descricao, usuario_id, criado_por, data_criacao', 'required'),
			array('usuario_id, criado_por', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>500),
			array('status', 'length', 'max'=>50),
			array('prioridade', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, descricao, usuario_id, criado_por, data_criacao, status, prioridade', 'safe', 'on'=>'search'),
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
			'requisicoesIteracoes' => array(self::HAS_MANY, 'RequisicoesIteracoes', 'requisicao_id'),
			'usuario' => array(self::BELONGS_TO, 'Usuarios', 'usuario_id'),
			'criadoPor' => array(self::BELONGS_TO, 'Usuarios', 'criado_por'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'descricao' => 'Descricao',
			'usuario_id' => 'Usuario',
			'criado_por' => 'Criado Por',
			'data_criacao' => 'Data Criacao',
			'status' => 'Status',
			'prioridade' => 'Prioridade',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('criado_por',$this->criado_por);
		$criteria->compare('data_criacao',$this->data_criacao,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('prioridade',$this->prioridade,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}