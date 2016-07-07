<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'View User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User
            <small>View User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>user">Manage User</a></li>
            <li class="active">View User</li>
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
                                                'first_name',
                                                'last_name',
                                                'username',
                                                'email:email',
                                                [
                                                    'attribute'=>'user_type_id',
                                                    'value'=>$model->usertype->title
                                                ],
                                                [
                                                    'attribute'=>'status',
                                                    'value'=>$model->status == 1 ? 'Active':'Inactive'
                                                ],
                                                [
                                                    'attribute'=>'created_at',
                                                    'value'=>date('Y-m-d H:i:s',$model->created_at)
                                                ],
                                                [
                                                    'attribute'=>'updated_at',
                                                    'value'=>date('Y-m-d H:i:s',$model->updated_at)
                                                ],
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

