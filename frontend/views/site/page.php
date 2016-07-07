<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

//echo "<pre>"; print_r($model); die;
$this->title = $model->page_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?php echo $this->title?></h1>
<div class="row">
    <div class="col-lg-12">
        <?php echo $model->page_content;?>
    </div>
</div>
