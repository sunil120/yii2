<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\RoleAction;
use common\models\RoleModule;
use common\models\RoleController;

/* @var $this yii\web\View */
/* @var $model common\models\RoleAction */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="form-group">
            <?= $form->field($model, 'module_name')->dropDownList(ArrayHelper::map(RoleAction::find()->all(),'module_name','module_name'));?>
        </div>
        <div class="form-group">
          <?php if($model->isNewRecord):
              echo $form->field($model, 'controller_name')->dropDownList(ArrayHelper::map(RoleAction::find()->all(),'controller_name','controller_name'));
          else:
              echo $form->field($model, 'controller_name')->textInput(['maxlength' => true, 'class'=>'form-control', 'readonly'=>'readonly']);
          endif; ?>
        </div>
        <div class="form-group">
          <?= $form->field($model, 'action_name')->textInput(['maxlength' => true, 'class'=>'form-control']) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/'.Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
    </div>
<?php ActiveForm::end(); ?>
