<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>
<?= "<?php " ?>$form = ActiveForm::begin([
        'id'=>'<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'options' => [ 'enctype' => 'multipart/form-data'],
        'fieldConfig' => ['options' => ['class' => 'col-sm-12']]
    ]);?>

    <div id="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form" class="box-body">
    <?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) { ?>
        <div class="form-group">
            <?php echo "<?= " . $generator->generateActiveField($attribute) . " ?>\n";?>
        </div>
    <?php  }
    } ?>
    </div>
    <div class="box-footer">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= "<?= " ?>Html::a('Cancel',['/'.Yii::$app->controller->id],['class' => 'btn btn-default']) ?>
    </div>
<?= "<?php " ?>ActiveForm::end()?>


