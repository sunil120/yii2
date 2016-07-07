<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
        'id'=>'country-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'options' => [ 'enctype' => 'multipart/form-data'],
        'fieldConfig' => ['options' => ['class' => 'col-sm-12']]
    ]);?>

    <div id="country-form" class="box-body">
            <div class="form-group">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
            <div class="form-group">
            <?= $form->field($model, 'status')->textInput() ?>
        </div>
        </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel',['/'.Yii::$app->controller->id],['class' => 'btn btn-default']) ?>
    </div>
<?php ActiveForm::end()?>


