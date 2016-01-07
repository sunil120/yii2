<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use common\components\AccessRule;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <section class="content-header">
        <h1>
          <?= "<?= " ?>Html::encode($this->title) ?>
          <small>Manage <?= "<?= " ?>Html::encode($this->title) ?></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= '<?= ' ?>Yii::$app->params['adminUrl'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Manage <?= "<?= " ?>Html::encode($this->title) ?></li>
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
                                    <?= "<?php "?>if(AccessRule::accessRule(Yii::$app->controller->id ,'create')):?>
                                        <?= "<?= " ?>Html::a(<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-default']) ?>
                                    <?= "<?php "?>endif;?>
                                    <?php if(!empty($generator->searchModelClass)): ?>
                                    <?="<?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12"> 
                                    <?php if ($generator->indexWidgetType === 'grid'): 
                                    echo "<?php Pjax::begin();?>" ?>      
                                    <?= "<?= " ?>GridView::widget([
                                    'dataProvider'  => $dataProvider,
                                    <?= !empty($generator->searchModelClass) ? 
                                    "'filterModel'  => \$searchModel,
                                    'emptyCell'     =>'-',
                                    'options'       => ['class' => 'table-responsive'],
                                    'tableOptions'  => ['class' => 'table  table-bordered table-hover'],
                                    'layout'        => '{items}<div class=\'table-footer\'>{summary}{pager}</div>',
                                    'pager'         => [
                                                        'prevPageLabel'=>'First',
                                                        'nextPageLabel'=>'Last',
                                                        'nextPageLabel'=>'Next',
                                                        'prevPageLabel'=>'Prev',
                                                        'maxButtonCount' => '2',
                                                    ],
                                    'columns'       =>  [" : "'columns' =>[";?>
                                        <?php echo "\n";?>
                                        ['class'    => 'yii\grid\SerialColumn'],
                                    <?php
                                    $count = 0;
                                    if (($tableSchema = $generator->getTableSchema()) === false) {
                                    foreach ($generator->getColumnNames() as $name) {
                                        if (++$count < 6) {
                                            echo "'" . $name . "',";
                                        } else {
                                            echo "//'" . $name . "',";
                                        }
                                    }
                                    } else {
                                    foreach ($tableSchema->columns as $column) {
                                        $format = $generator->generateColumnFormat($column);
                                        if (++$count < 6) {
                                            if($column->name!="id"){
                                                echo " \t\t\t\t\t'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                            } else {
                                                echo "\t'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                            }
                                        } else {
                                            echo "\t\t\t\t\t// '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                        }
                                    }
                                    }
                                    ?>
                                    [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update} {view} {delete}',
                                    'header'=>'Action',
                                    'headerOptions' => ['style' => 'min-width:90px'],
                                    'buttons' => [
                                        'update' => function ($url , $model) {
                                            return Html::a(
                                                '<span class="glyphicon glyphicon-pencil"></span>',
                                                [Yii::$app->controller->id.'/create', 'id' => $model->id], 
                                                [
                                                    'title' => 'Update',
                                                    'data-pjax' => '0',
                                                    'class'=>AccessRule::accessRule(Yii::$app->controller->id ,'update')==false?'hide':''
                                                ]
                                            );
                                        },
                                        'view' => function ($url , $model , $key) {
                                            return Html::a(
                                                '<span class="glyphicon glyphicon-eye-open"></span>',
                                                [Yii::$app->controller->id.'/view', 'id' => $model->id], 
                                                [
                                                    'title' => 'View',
                                                    'data-pjax' => '0',
                                                    'class'=>AccessRule::accessRule(Yii::$app->controller->id ,'view')==false?'hide':''
                                                ]
                                            );
                                        },
                                        'delete' => function ($url , $model , $key) {
                                            return Html::a(
                                                '<span class="glyphicon glyphicon-trash"></span>',
                                                [Yii::$app->controller->id.'/delete', 'id' => $model->id], 
                                                [
                                                    'title' => 'Delete',
                                                    'data-pjax' => '0',
                                                    'data-confirm'=>'Are you sure you want to delete this item1?',
                                                    'data-method'=>'POST',
                                                    'class'=>AccessRule::accessRule(Yii::$app->controller->id ,'delete')==false?'hide':''
                                                ]);
                                            }],
                                        ],
                                    ]
                                ]); ?>
                                <?php else: ?>
                                 <?= "<?= " ?>ListView::widget([
                                     'dataProvider' => $dataProvider,
                                     'itemOptions' => ['class' => 'item'],
                                     'itemView' => function ($model, $key, $index, $widget) {
                                         return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                                     },
                                 ]) ?>
                                 <?php endif; 
                                 echo "<?php Pjax::end();?>" ?>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

