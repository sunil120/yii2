<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use common\models\RoleController;
//use common\models\RoleModule;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoleActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Actions';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Role Action
          <small>Manage Role Action</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Manage Role Action</li>
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
                                        <?= Html::a('Create Action', ['create'], ['class' => 'btn btn-default']) ?>
                                        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">    
                                        <?php Pjax::begin(); ?>
                                        <?= GridView::widget([
                                           'id' => 'table',
                                           'dataProvider' => $dataProvider,
                                           'filterModel' => $searchModel,
                                            'tableOptions' => ['class' => 'table  table-bordered table-hover'],
                                           'layout'=>"{items}<div class=\"table-footer\">{summary}{pager}</div>",
                                            'pager' => [
                                                'prevPageLabel'=>'First',
                                                'nextPageLabel'=>'Last',
                                                'nextPageLabel'=>'Next',
                                                'prevPageLabel'=>'Prev',
                                                'maxButtonCount' => '2',
                                            ],
                                           'columns' => [
                                                'id',
                                                'module_name',
                                                'controller_name',
                                                'action_name',
                                                [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{update}{delete}',
                                                'header'=>'Action'
                                                ],
                                                ],
                                            ]); ?>
                                        <?php Pjax::end(); ?>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

