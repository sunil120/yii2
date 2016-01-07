<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\UserType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="box-body" id="treeview">
    <div class="form-group">
        <?= $form->field($model, 'user_type_id')->dropDownList(ArrayHelper::map(UserType::find()->all(),'id','title'));?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?php if($model->isNewRecord) :
            echo $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]);
        else:
            echo $form->field($model, 'password_hash')->passwordInput(['maxlength' => true , 'placeholder'=>'******' , 'value'=>'']);
        endif;
        ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'status')->dropDownList(array('1'=>'Active', '0'=>'Inactive'),['prompt'=>'Status','class'=>'form-control']); ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'imageFile')->fileInput() ?>
    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/'.Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?php $form = ActiveForm::begin(); ?>

    

