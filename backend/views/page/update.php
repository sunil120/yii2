<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'Update Page';
$this->params['breadcrumbs'][] = ['label' => 'Page', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page
            <small>Update Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>page">Manage Page</a></li>
            <li class="active">Update Page</li>
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
                  <h3 class="box-title">Update Page</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
