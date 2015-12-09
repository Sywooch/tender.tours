<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
        'css/style.css',
        'css/style-raiting-man.css',
        'css/style-raiting.css',
        'css/font-awesome/css/font-awesome.min.css'
        
    ];
    public $js = [
        'js/script.js',
    ];
    public $depends = [
        'frontend\assets\JqueryAsset',
        'frontend\assets\BootstrapAsset',
    ];
}
