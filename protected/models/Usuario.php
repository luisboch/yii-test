<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $data_criacao
 * @property integer $departamento_id
 * @property boolean $responsavel
 * @property integer $tipo_usuario
 *
 * The followings are the available model relations:
 * @property CursoArquivos[] $cursoArquivoses
 * @property Departamento $departamento
 * @property RequisicoesIteracoes[] $requisicoesIteracoes
 * @property Aviso[] $avisos
 * @property Notificacoes[] $notificacoes
 * @property Aviso[] $avisos1
 * @property Requisicao[] $requisicoes
 * @property Requisicao[] $requisicoes1
 */
class Usuario extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, email, senha, data_criacao, tipo_usuario', 'required'),
            array('departamento_id, tipo_usuario', 'numerical', 'integerOnly' => true),
            array('nome, email, senha', 'length', 'max' => 200),
            array('responsavel', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome, email, senha, data_criacao, departamento_id, responsavel, tipo_usuario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cursoArquivoses' => array(self::HAS_MANY, 'CursoArquivos', 'usuario_id'),
            'departamento' => array(self::BELONGS_TO, 'Departamento', 'departamento_id'),
            'requisicoesIteracoes' => array(self::HAS_MANY, 'RequisicoesIteracoes', 'usuario_id'),
            'avisos' => array(self::HAS_MANY, 'Aviso', 'usuario_id'),
            'notificacoes' => array(self::HAS_MANY, 'Notificacoes', 'usuario_id'),
            'avisos1' => array(self::MANY_MANY, 'Aviso', 'aviso_destinatario(usuario_id, aviso_id)'),
            'requisicoes' => array(self::HAS_MANY, 'Requisicoes', 'usuario_id'),
            'requisicoes1' => array(self::HAS_MANY, 'Requisicoes', 'criado_por'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
            'data_criacao' => 'Data Criacao',
            'departamento_id' => 'Departamento',
            'responsavel' => 'Responsavel',
            'tipo_usuario' => 'Tipo Usuario',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('senha', $this->senha, true);
        $criteria->compare('data_criacao', $this->data_criacao, true);
        $criteria->compare('departamento_id', $this->departamento_id);
        $criteria->compare('responsavel', $this->responsavel);
        $criteria->compare('tipo_usuario', $this->tipo_usuario);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function login($email, $senha) {
        $senha = hash("sha512", $senha);

        $criteria = new CDbCriteria;
        $criteria->compare('email', $email);
        $criteria->compare('senha', $senha);
        
        $caActive = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        
        if($caActive->itemCount == 0 ){
            return null;
        }
        
        return  $caActive->data[0];
    }

    protected function beforeSave() {
        // crypt password
        $this->senha = hash("sha512", $this->senha);
    }

}
