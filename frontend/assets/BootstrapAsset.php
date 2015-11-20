<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class BootstrapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        'bootstrap/css/bootstrap-theme.min.css'
    ];
    public $js = [
        'bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
        
    ];
}
