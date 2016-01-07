<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\User;
use common\components\AccessRule;
AppAsset::register($this);
$this->beginPage(); 
$user = User::find()->where(Yii::$app->user->id)->one();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Panel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Yii::$app->params['fileUrl']?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $user->first_name ?> <?php echo $user->last_name ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">  
                    <img src="<?php echo Yii::$app->params['fileUrl']?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <?php if(AccessRule::accessRule('user' ,'view')):?>  
                    <div class="pull-left">
                      <a href="<?= Yii::$app->params['adminUrl'] ?>user/view/<?= Yii::$app->user->id?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <?php endif; ?>
                    <div class="pull-right">
                      <a href="<?= Yii::$app->params['adminUrl'] ?>site/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Yii::$app->params['fileUrl']?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user->first_name ?> <?php echo $user->last_name ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if(AccessRule::accessRule('site' ,'index')):?>
            <li class="active treeview">
                <a href="<?= Yii::$app->params['adminUrl'] ?>">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php endif;?>
            <?php if(AccessRule::accessRule('companies' ,'index') || AccessRule::accessRule('companies' ,'create')):?>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-building-o"></i> <span>Company Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(AccessRule::accessRule('companies' ,'index')):?>  
                <li><a href="<?= Yii::$app->params['adminUrl'] ?>companies"><i class="fa fa-circle-o"></i>Manage Company</a></li>
                <?php endif;?>
                <?php if(AccessRule::accessRule('companies' ,'create')):?>
                <li class="active"><a href="<?= Yii::$app->params['adminUrl'] ?>companies/create"><i class="fa fa-plus"></i>Add Company</a></li>
                <?php endif;?>
              </ul>
            </li>
            <?php endif;?>
            <?php if(AccessRule::accessRule('user' ,'index') || AccessRule::accessRule('user' ,'create')):?>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(AccessRule::accessRule('user' ,'index')):?>  
                <li class="active"><a href="<?= Yii::$app->params['adminUrl'] ?>user"><i class="fa fa-circle-o"></i>Manage Users</a></li>
                <?php endif;?>
                <?php if(AccessRule::accessRule('user' ,'create')):?>  
                <li><a href="<?= Yii::$app->params['adminUrl'] ?>user/create"><i class="fa fa-plus"></i>Add User</a></li>
                 <?php endif;?>
              </ul>
            </li>
            <?php endif;?>
            <?php if(AccessRule::accessRule('usertype' ,'index') || AccessRule::accessRule('roleaction' ,'index')):?>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user-plus"></i> <span>Roles & Permission</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(AccessRule::accessRule('usertype' ,'index') || AccessRule::accessRule('usertype' ,'create')):?>
                <li class="active"><a href="<?= Yii::$app->params['adminUrl'] ?>usertype"><i class="fa fa-circle-o"></i>Manage User Type</a></li>
                <?php endif;?>
                <?php if(AccessRule::accessRule('roleaction' ,'index') || AccessRule::accessRule('roleaction' ,'create')):?>
                <li><a href="<?= Yii::$app->params['adminUrl'] ?>roleaction"><i class="fa fa-circle-o"></i>Manage Role Action</a></li>
                <?php endif;?>
              </ul>
            </li>
            <?php endif;?>
            <?php if(AccessRule::accessRule('page' ,'index') || AccessRule::accessRule('page' ,'index')):?>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-file"></i> <span>Page Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(AccessRule::accessRule('page' ,'index')):?>
                <li class="active"><a href="<?= Yii::$app->params['adminUrl'] ?>page"><i class="fa fa-circle-o"></i>Manage Pages</a></li>
                <?php endif;?>
                <?php if(AccessRule::accessRule('page' ,'create')):?>
                <li><a href="<?= Yii::$app->params['adminUrl'] ?>page/create"><i class="fa fa-plus"></i>Add Page</a></li>
                <?php endif;?>
              </ul>
            </li>
            <?php endif;?>
          </ul>
        </section>
        <!-- /.sidebar -->
        </aside>
        <?= Alert::widget() ?>
        <?= $content ?>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.3.0
            </div>
            <strong>Copyright &copy; <?php echo date('Y')?><a href="#">Cygnet Infotech</a>.</strong> All rights reserved.
        </footer>
    </div>
</div>
<div>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
<script>
</script>
  
