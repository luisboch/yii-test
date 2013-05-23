<?php
/* @var $this AreaCursoController */
/* @var $model AreaCurso */

$this->breadcrumbs=array(
	'Area Cursos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AreaCurso', 'url'=>array('index')),
	array('label'=>'Create AreaCurso', 'url'=>array('create')),
	array('label'=>'View AreaCurso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AreaCurso', 'url'=>array('admin')),
);
?>

<h1>Update AreaCurso <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>