<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = 'Error : '.$name;;
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Error Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Error</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?=$this->title?></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
              <div class="form-group">
              <?= nl2br(Html::encode($message)) ?>
              </div>
          </div>
        </div><!-- /.box -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
</div>
