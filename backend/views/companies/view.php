<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = 'View Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Company
            <small>View Company</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>companies">Manage Company</a></li>
            <li class="active">View Company</li>
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
                                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
                                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">    
                                         <?= DetailView::widget([
                                            'model' => $model,
                                            'attributes' => [
                                                'id',
                                                'company_name',
                                                'company_address',
                                                'company_email:email',
                                                'created_dt',
                                                'status',
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

   


