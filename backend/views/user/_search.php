<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BranchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="example1_filter" class="branches-search dataTables_filter  pull-right">

    <?php $filter_field =  array_flip(array_diff(array_flip($model->attributeLabels()), array('auth_key' ,'password_hash','password_reset_token','access_token','image','updated_at'))); ?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?=$form->field($model, 'search') ?>
    <?=$form->field($model, 'field')->dropDownList($filter_field,['prompt'=>'All']); ?>
    <?=Html::submitButton('Search', ['class' => 'btn btn-default']) ?>
    <?php ActiveForm::end(); ?>

</div>


