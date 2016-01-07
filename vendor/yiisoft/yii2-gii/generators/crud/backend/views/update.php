<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Update ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $title = Inflector::camel2words(StringHelper::basename($generator->modelClass))?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title ?>
      <small><?= 'Update ' . $title ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo '<?php echo  Yii::$app->params[\'adminUrl\']?>'?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo '<?php echo  Yii::$app->params[\'adminUrl\']?>'?>/<?php echo '<?php echo  Yii::$app->controller->id?>'?>"><?= 'Manage ' . $title ?></a></li>
      <li class="active"><?= 'Update ' . $title ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= 'Update ' . $title ?></h3>
          </div>
          <!-- form start -->
           <?= "<?= " ?>$this->render('_form', [
              'model' => $model,
          ]) ?>
        </div>
    </div> 
  </section>
</div>

