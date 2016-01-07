<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = 'Update Companies: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Company
            <small>Update Company</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>companies">Manage Company</a></li>
            <li class="active">Update Company</li>
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
                  <h3 class="box-title">Update Company</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
