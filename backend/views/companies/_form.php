<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="form-group">
          <?= $form->field($model, 'company_name')->textInput(['maxlength' => true , 'class'=>'form-control']) ?>
        </div>
        <div class="form-group">
          <?= $form->field($model, 'company_address')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
        </div>
        <div class="form-group">
          <?= $form->field($model, 'company_email')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
        </div>
        <div class="form-group">
          <?= $form->field($model, 'status')->dropDownList(array('1'=>'Active', '0'=>'Inactive'),['prompt'=>'Status','class'=>'form-control']); ?>
        </div>

    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/'.Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
    </div>
<?php ActiveForm::end(); ?>
