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
        
    ];
    public $js = [
        'jquery/jquery.min.js',
    ];
    public $depends = [
        
    ];
}
