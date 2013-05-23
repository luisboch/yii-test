<?php
/* @var $this AreaCursoController */
/* @var $model AreaCurso */

$this->breadcrumbs=array(
	'Area Cursos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AreaCurso', 'url'=>array('index')),
	array('label'=>'Create AreaCurso', 'url'=>array('create')),
	array('label'=>'Update AreaCurso', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AreaCurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AreaCurso', 'url'=>array('admin')),
);
?>

<h1>View AreaCurso #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'data_criacao',
	),
)); ?>
