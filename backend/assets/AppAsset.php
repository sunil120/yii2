<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/bootstrap/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'web/dist/css/AdminLTE.min.css',
        
    ];
    public $js = [
        'https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js',
        'web/bootstrap/js/bootstrap.min.js',
        //'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'web/dist/js/app.min.js',
        
        
    ];
    public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
);
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
