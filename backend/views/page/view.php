
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = 'View Page';
$this->params['breadcrumbs'][] = ['label' => 'Page', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page
            <small>View Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo Yii::$app->params['adminUrl']?>page">Manage Page</a></li>
            <li class="active">View Page</li>
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
                                                [
                                                'attribute'=>'parent_id',
                                                'value'=>'parent.page_name',
                                                ],
                                                [
                                                    'attribute'=>'is_url',
                                                    'value'=>$model->is_url == 1 ? 'Yes':'No'
                                                ],
                                                [
                                                    'attribute'=>'page_url',
                                                    'value'=>$model->is_url == 1 ?$model->page_url:''
                                                ],            
                                                'page_name',
                                                'page_content:ntext',
                                                [
                                                    'attribute'=>'is_seo',
                                                    'value'=>$model->is_seo == 1 ? 'Yes':'No'
                                                ],
                                                [
                                                    'attribute'=>'page_seo_name',
                                                    'value'=>$model->is_seo == 1 ?$model->page_seo_name:''
                                                ],              
                                                'meta_values:ntext',
                                                [
                                                    'attribute'=>'status',
                                                    'value'=>$model->status == 1 ? 'Active':'Inactive'
                                                ],
                                                'created_dt',
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

 
