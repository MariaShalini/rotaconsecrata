<?php
/* @var $this MembersController */
/* @var $model Members */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'members-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>80,'maxlength'=>100,'placeholder'=>'Enter Sister Fullname')); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<figure class="photo">
	<?php if ($model->isNewRecord or !$model->photo) {
			$photo_path = "/images/placeholder-woman.jpg";
			$src = Yii::app()->request->baseUrl . $photo_path;
			list($width, $height) = getimagesize(".$photo_path");
			$label = 'Add Photo';
		} else {
			$src = Yii::app()->request->baseUrl . '/images/members/' . $model->photo;
			list($width, $height) = getimagesize("./images/members/" . $model->photo);
			$label = 'Update Photo';
		}
		$alt = 'Member photo';
		echo CHtml::image($src, $alt, array('width' => $width, 'height' => $height));
		echo "<figcaption>";
		echo CHtml::link($label, array('photo', 'id'=>$model->id));
		echo "</figcaption>";
	?>
	</figure>
	
	<div class="rightSection">

	<div class="row">
		<?php echo $form->labelEx($model,'maiden_name'); ?>
		<?php echo $form->textField($model,'maiden_name',array('size'=>54,'maxlength'=>100,'placeholder'=>'Enter Maiden Name')); ?>
		<?php echo $form->error($model,'maiden_name'); ?>
	</div>

	<div class="row">
	<span class="leftHalf">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->telField($model,'mobile',array('size'=>15,'maxlength'=>15,'placeholder'=>'Enter Mobile, if any')); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</span>
	<span class="rightHalf">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->emailField($model,'email',array('placeholder'=>'Enter Email, if any')); ?>
		<?php echo $form->error($model,'email'); ?>
	</span>
	</div>

	<div class="row">
	<span class="leftHalf">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->dateField($model,'dob',array('placeholder'=>'Enter Date of Birth')); ?>
		<?php echo $form->error($model,'dob'); ?>
	</span>
	<span class="rightHalf">
		<?php echo $form->labelEx($model,'joining_dt'); ?>
		<?php echo $form->dateField($model,'joining_dt',array('placeholder'=>'Enter Date of Joining')); ?>
		<?php echo $form->error($model,'joining_dt'); ?>
	</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vestation_dt'); ?>
		<?php echo $form->dateField($model,'vestation_dt',array('placeholder'=>'Enter Date of Vestation')); ?>
		<?php echo $form->error($model,'vestation_dt'); ?>
	</div>

	<div class="row">
	<span class="leftHalf">
		<?php echo $form->labelEx($model,'first_commitment_dt'); ?>
		<?php echo $form->dateField($model,'first_commitment_dt',array('placeholder'=>'Enter Date of First Commitment')); ?>
		<?php echo $form->error($model,'first_commitment_dt'); ?>
	</span>
	<span class="rightHalf">
		<?php echo $form->labelEx($model,'final_commitment_dt'); ?>
		<?php echo $form->dateField($model,'final_commitment_dt',array('placeholder'=>'Enter Date of Final')); ?>
		<?php echo $form->error($model,'final_commitment_dt'); ?>
	</span>
	</div>
	</div><!-- end of div.rightSection -->

	<div class="row">
	<span class="left34">
		<?php echo $form->labelEx($model,'fathers_name'); ?>
		<?php echo $form->textField($model,'fathers_name',array('placeholder'=>'Enter Fathers Fullname','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fathers_name'); ?>
	</span>
	<span class="right14">
		<?php echo $form->labelEx($model,'father_alive',array('label'=>'Alive?')); ?>
		<?php echo $form->checkBox($model,'father_alive'); ?>
		<?php echo $form->error($model,'father_alive'); ?>
	</span>
	</div>

	<div class="row">
	<span class="left34">
		<?php echo $form->labelEx($model,'mothers_name'); ?>
		<?php echo $form->textField($model,'mothers_name',array('placeholder'=>'Enter Mothers Fullname','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mothers_name'); ?>
	</span>
	<span class="right14">
		<?php echo $form->labelEx($model,'mother_alive',array('label'=>'Alive?')); ?>
		<?php echo $form->checkBox($model,'mother_alive'); ?>
		<?php echo $form->error($model,'mother_alive'); ?>
	</span>
	</div>

	<div class="row">
	<span class="left23">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'placeholder'=>'Enter Residential Address')); ?>
		<?php echo $form->error($model,'address'); ?>
	</span>
	<span class="right13" style="float:right">
	<div>
		<?php echo $form->labelEx($model,'home_phone'); ?>
		<?php echo $form->telField($model,'home_phone',array('size'=>15,'maxlength'=>15,'placeholder'=>'Enter Home Phone')); ?>
		<?php echo $form->error($model,'home_phone'); ?>
	</div>
	<div>
		<?php echo $form->labelEx($model,'home_mobile'); ?>
		<?php echo $form->telField($model,'home_mobile',array('size'=>15,'maxlength'=>15,'placeholder'=>'Enter Home Mobile')); ?>
		<?php echo $form->error($model,'home_mobile'); ?>
	</div>
	</span>
	</div>

	<div style="clear:both">
	<div class="row">
		<?php echo $form->labelEx($model,'parish'); ?>
		<?php echo $form->textField($model,'parish',array('size'=>50,'maxlength'=>50,'placeholder'=>'Enter Parish')); ?>
		<?php echo $form->error($model,'parish'); ?>
	</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diocese'); ?>
		<?php echo $form->textField($model,'diocese',array('size'=>30,'maxlength'=>30,'placeholder'=>'Enter Diocese')); ?>
		<?php echo $form->error($model,'diocese'); ?>
	</div>

	<div class="row">
	<span class="leftHalf">
		<?php echo $form->labelEx($model,'demise_dt'); ?>
		<?php echo $form->dateField($model,'demise_dt'); ?>
		<?php echo $form->error($model,'demise_dt'); ?>
	</span>
	<span class="rightHalf">
		<?php echo $form->labelEx($model,'leaving_dt'); ?>
		<?php echo $form->dateField($model,'leaving_dt'); ?>
		<?php echo $form->error($model,'leaving_dt'); ?>
	</span>
	</div>

	<div class="row">
	<span class="leftHalf">
		<?php echo $form->labelEx($model,'mission'); ?>
		<?php echo $form->checkBox($model,'mission'); ?>
		<?php echo $form->error($model,'mission'); ?>
	</span>
	<span class="rightHalf">
		<?php echo $form->labelEx($model,'generalate'); ?>
		<?php echo $form->checkBox($model,'generalate'); ?>
		<?php echo $form->error($model,'generalate'); ?>
	</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'community'); ?>
		<?php echo $form->textField($model,'community'); ?>
		<?php echo $form->error($model,'community'); ?>
	</div>

	<div class="row">
	<span class="right13">
		<?php echo $form->labelEx($model,'swiss_visit'); ?>
		<?php echo $form->checkBox($model,'swiss_visit'); ?>
		<?php echo $form->error($model,'swiss_visit'); ?>
	</span>
	<span class="right13">
		<?php echo $form->labelEx($model,'holyland_visit'); ?>
		<?php echo $form->checkBox($model,'holyland_visit'); ?>
		<?php echo $form->error($model,'holyland_visit'); ?>
	</span>
	<span class="right13">
		<?php echo $form->labelEx($model,'family_abroad'); ?>
		<?php echo $form->checkBox($model,'family_abroad'); ?>
		<?php echo $form->error($model,'family_abroad'); ?>
	</span>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
