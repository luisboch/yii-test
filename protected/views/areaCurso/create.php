<?php
/* @var $this AreaCursoController */
/* @var $model AreaCurso */

$this->breadcrumbs=array(
	'Area Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AreaCurso', 'url'=>array('index')),
	array('label'=>'Manage AreaCurso', 'url'=>array('admin')),
);
?>

<h1>Create AreaCurso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>