<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Country */

$this->title = 'Update Country';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Country      <small>Update Country</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo  Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo  Yii::$app->params['adminUrl']?>/<?php echo  Yii::$app->controller->id?>">Manage Country</a></li>
      <li class="active">Update Country</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Update Country</h3>
          </div>
          <!-- form start -->
           <?= $this->render('_form', [
              'model' => $model,
          ]) ?>
        </div>
    </div> 
  </section>
</div>

