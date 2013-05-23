<?php
/* @var $this AreaCursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Area Cursos',
);

$this->menu=array(
	array('label'=>'Create AreaCurso', 'url'=>array('create')),
	array('label'=>'Manage AreaCurso', 'url'=>array('admin')),
);
?>

<h1>Area Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
