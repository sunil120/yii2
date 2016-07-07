<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="example1_filter" class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search dataTables_filter  pull-right">


    <?= "<?php " ?>$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= "<?=" ?>$form->field($model, 'search') ?>
    <?= "<?=" ?>$form->field($model, 'field')->dropDownList($model->attributeLabels(),['prompt'=>'All']); ?>
    <?= "<?=" ?>Html::submitButton('Search', ['class' => 'btn btn-default']) ?>
    <?= "<?php " ?>ActiveForm::end(); ?>

</div>


