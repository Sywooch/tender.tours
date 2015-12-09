<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class JqueryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets';
    public $css = [
        'jquery/jquery-ui.min.css',
    ];
    public $js = [
        'jquery/jquery.min.js',
        'jquery/jquery-ui.min.js',
        'jquery/jquery.rating-2.0.min.js',
    ];
    public $depends = [
        
    ];
}
