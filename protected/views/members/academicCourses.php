<div id="academicCourses-view">
<?php
$courses = $model->academicCourses;
echo "<div id='course-list'>";
if ($courses) {
	$provider = new CArrayDataProvider($courses, array(
		'id'=>'academicCourses',
		'sort'=>array(
			'defaultOrder' => 'certificate_dt ASC',
			'attributes' => array(
				'certificate_dt', 'name', 'institution', 'board', 'class', 'subjects', 'medium', 'remarks'
			),
		),
		'pagination' => array(
			'pageSize' => 10
		)
	));
	$label = $courses[0]->attributeLabels();
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'academicCourses-grid',
		'dataProvider'=>$provider,
		'columns'=>array(
			array(
				'name' => 'name',
				'header' => $label['name'],
			),
			array(
				'name' => 'institution',
				'header' => $label['institution'],
			),
			array(
				'name' => 'board',
				'header' => $label['board'],
			),
			array(
				'name' => 'class',
				'header' => $label['class'],
			),
			array(
				'name' => 'certificate_dt',
				'header' => $label['certificate_dt'],
			),
			array(
				'name' => 'subjects',
				'header' => $label['subjects'],
			),
			array(
				'name' => 'medium',
				'header' => $label['medium'],
			),
			array(
				'name' => 'remarks',
				'header' => $label['remarks'],
			),
			array(
				'class' => 'CButtonColumn',
				'buttons' => array(
					'view' => array('visible' => 'false'),
					'update' => array('url' => 'array("/academicCourses/update","id"=>$data->id)'),
					'delete' => array('url' => 'array("/academicCourses/delete","id"=>$data->id)'),
				)
			),
		)
	));
}
echo "</div>";
echo "<div id='academicCourses-edit'>";
$course = new AcademicCourses;
$course->member_id = $model->id;
$this->renderPartial("/academicCourses/_form", array(
	'model' => $course,
));
echo "</div>";
?>
</div>
