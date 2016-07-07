<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompaniesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="example1_filter" class="dataTables_filter  pull-right">
    <?php $form = ActiveForm::begin([
        'id'=>'search_from',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'search') ?>
    <?= $form->field($model, 'field')->dropDownList($model->attributeLabels(),['prompt'=>'All']); ?>
    <?= Html::submitButton('Search', ['class' => 'btn btn-default']) ?>
    <?php ActiveForm::end(); ?>

</div>
