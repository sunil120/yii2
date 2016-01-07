<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = 'Manage Permission';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Company
            <small>Manage Permission</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>companies">Manage User Type</a></li>
            <li class="active">Manage Permission</li>
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
                  <h3 class="box-title">Manage Permission</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?= $this->render('_form', [
                    'model' => $model,
                    'tree_view'=>$tree_view
                ]) ?>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
