<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\UserType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\RoleMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
    <div class="box-body" id="treeview">
        <div class="form-group">
            <?= $form->field($model, 'user_type_id')->dropDownList(ArrayHelper::map(UserType::find()->all(),'id','title'));?>
        </div>
        <div class="form-group">
            <?= $tree_view;?>
        </div>
        <div class="box-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Cancel', ['/usertype'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>    
<?php ActiveForm::end(); ?>

<script>
    
    
 $(document).on('click', ".module_group", function() {
    if($(this).prop("checked") == true){
        $(this).parent().find('ul li > input[type=checkbox]').prop('checked',true);
    } else if($(this).prop("checked") == false) {
        $(this).parent().find(('ul li > input[type=checkbox]')).prop('checked',false);
    }
});
$(document).on('click', ".controller_group", function() {
    if($(this).prop("checked") == true){
        $(this).parent().find('ul li > input[type=checkbox]').prop('checked',true);
    } else if($(this).prop("checked") == false) {
        $(this).parent().find(('ul li > input[type=checkbox]')).prop('checked',false);
    }
});

var ccheck = 0;
$('.controller_group').each(function(){
    var cthis = $(this);
    $(this).parent().find('ul li > input[type=checkbox]').each(function(){
        if($(this).prop("checked") == false){
            ccheck = 0;
        } else {
            ccheck++;
        }
    });
    if(ccheck >0) {
       $(cthis).prop('checked',true);
    }
});

var wcheck = 0;
$('.module_group').each(function(){
    var cthis = $(this);
    $(this).parent().find('ul li > input[type=checkbox]').each(function(){
        if($(this).prop("checked") == false){
            ccheck = 0;
        } else {
            ccheck++;
        }
    });
    if(ccheck >0) {
       $(cthis).prop('checked',true);
    }
});

$("#rolemaster-user_type_id").on("change" , function(){
    var link = "<?php echo Yii::$app->params['adminUrl'].Yii::$app->controller->id.'/'.Yii::$app->controller->action->id ?>/";
    window.location.href = link+$(this).val();
});

</script>



