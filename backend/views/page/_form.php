<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Page;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box-body">
    <?php  $form = ActiveForm::begin([
                    'id'=>'page-form',
                    'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'options' => [ 'enctype' => 'multipart/form-data'],
                        'fieldConfig' => ['options' => ['class' => 'col-sm-12']]
            ]);
    
    ?>
    <div class="form-group">
        <?php if($model->isNewRecord):
            echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Page::find()->all(),'id','page_name'),['prompt'=>'Parent']);
        else :
            echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Page::find()->where('id != :id',['id'=>$model->id])->all(),'id','page_name'),['prompt'=>'Parent']);
        endif;
        ?>
    </div>
    <div class="form-group">
        <?=$form->field($model, 'page_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'page_content')->textarea(['rows' => 6]) ?>
    </div>
    <div class="form-group">
        <?=$form->field($model, 'is_url')->checkBox(['label' => 'Is Url','class'=>'checkbox-check']) ?>
    </div>
    <div class="form-group <?php echo $model->is_url == 1 ? '':'hide';?>">
        <?=$form->field($model, 'page_url')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group ">
        <?=$form->field($model, 'is_seo')->checkBox(['label' => 'Is SEO','class'=>'checkbox-check']) ?>
    </div>
    <div class="form-group <?php echo $model->is_url == 1 ? '':'hide';?>">
        <?=$form->field($model, 'page_seo_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?=$form->field($model, 'meta_key')->textInput(['maxlength' => true]); ?>
    </div>
    <div class="form-group">
        <?=$form->field($model, 'meta_values')->textInput(['maxlength' => true]); ?>
    </div>
    <div class="form-group">
    <?= $form->field($model, 'status')->dropDownList(array('1'=>'Active', '0'=>'Inactive'),['prompt'=>'Status','class'=>'form-control']); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/'.Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
$(function () {
    CKEDITOR.replace('page-page_content');
});
$(".checkbox-check").on('click' , function(){
    if($(this).prop('checked') == true) {
       $(this).parents('.form-group').next('.form-group').removeClass('hide');
    } else {
        $(this).parents('.form-group').next('.form-group').addClass('hide');
        $('#page-page_url').val('');
    }
})
</script>