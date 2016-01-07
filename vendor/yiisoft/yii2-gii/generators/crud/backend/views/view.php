<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\AccessRule;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
<?php $title =  ucfirst(StringHelper::basename($generator->modelClass));?>
$this->title = 'View <?=$title?>-'.$model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$udpateaccess = AccessRule::accessRule(Yii::$app->controller->id ,'update');
$deleteaccess = AccessRule::accessRule(Yii::$app->controller->id ,'delete');
?>
<div id="<?= $title ?>-view" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?= $title."\n" ?>
          <small><?= 'View ' . $title ?></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo '<?php echo  Yii::$app->params[\'adminUrl\']?>'?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo '<?php echo  Yii::$app->params[\'adminUrl\']?>'?>/<?php echo '<?php echo  Yii::$app->controller->id?>'?>"><?= 'Manage ' . $title ?></a></li>
          <li class="active"><?= 'Create ' . $title ?></li>
        </ol>
    </section>
    <section class="content">
            <div class="row">
              <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?= "<?php " ?>if($udpateaccess):?>
                                            <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
                                        <?= "<?php " ?>endif;?>
                                        <?= "<?php " ?>if($deleteaccess):?>
                                        <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                        <?= "<?php " ?>endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12"> 
                                    <?= "<?= " ?>DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                    <?php
                                    if (($tableSchema = $generator->getTableSchema()) === false) {
                                        foreach ($generator->getColumnNames() as $name) {
                                            echo "            '" . $name . "',\n";
                                        }
                                    } else {
                                        foreach ($generator->getTableSchema()->columns as $column) {
                                            $format = $generator->generateColumnFormat($column);
                                            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                        }
                                    }
                                    ?>
                                    ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

   




    