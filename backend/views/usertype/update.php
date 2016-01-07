<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserType */

$this->title = 'Create UserType';
$this->params['breadcrumbs'][] = ['label' => 'UserType', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            UserType
            <small>Update UserType</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>usertype">Manage UserType</a></li>
            <li class="active">Update UserType</li>
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
                  <h3 class="box-title">Update UserType</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
