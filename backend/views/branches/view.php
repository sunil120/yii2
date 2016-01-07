<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\AccessRule;

/* @var $this yii\web\View */
/* @var $model common\models\Branches */
$this->title = 'View Branches-'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$udpateaccess = AccessRule::accessRule(Yii::$app->controller->id ,'update');
$deleteaccess = AccessRule::accessRule(Yii::$app->controller->id ,'delete');
?>
<div id="Branches-view" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Branches
          <small>View Branches</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo  Yii::$app->params['adminUrl']?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo  Yii::$app->params['adminUrl']?>/<?php echo  Yii::$app->controller->id?>">Manage Branches</a></li>
          <li class="active">Create Branches</li>
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
                                        <?php if($udpateaccess):?>
                                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                        <?php endif;?>
                                        <?php if($deleteaccess):?>
                                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                        <?php endif;?>
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
            'company_id',
            'branch_name',
            'branch_address',
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

   




    