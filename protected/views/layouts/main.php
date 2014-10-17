<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php $burl = Yii::app()->request->baseUrl;
			echo CHtml::link(CHtml::image($burl . Yii::app()->params['logoPath'], Yii::app()->name), "$burl/"); ?></div>
                <?php if (!Yii::app()->user->isGuest): ?>
                <div id="search">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                                'id' => 'search_form',
                                                'action' => Yii::app()->createUrl('/members/search'),
                                                'method' => 'GET',
                        ));
                        echo CHtml::textField('key', '', array('id' => 'search_key'));
                        echo CHtml::imageButton(Yii::app()->request->baseUrl . '/images/search.png');
                        $this->endWidget();
                        Yii::app()->clientScript->registerScript('global-search', "
                        $('#search_form').submit(function() {
                                $.get($(this).attr('action'), {
                                        'key': $('#search_key').val()
                                }, function(data) {
                                        $('#content').html(data);
                                } );
                                return false;
                        } );
                        $('#search_key').focus();
                        "); ?>
                </div>
                <?php endif ?>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Change Password', 'url'=>array('/site/changePassword'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> SANJOSE SOLUTIONS.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
