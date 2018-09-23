<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        
        
        'css/dx1x1.css',
        'css/lt.css',
        'css/d2ss.css', 
        'css/mystyle1.css', 
        'css/font-awesome.min.css', 
        'css/style/style11.css',
        'css/style/style22.css',
        'css/style/style3.css',
        'css/assets/font-awesome/css/font-awesome.css',
        'css/assets/css/zabuto_calendar.css',
        'css/assets/lineicons/style.css',   
        'css/assets/css/style55.css', 
        'css/assets/css/style-responsive.css',
  

    ];
    public $js = [
        'js/java2.js',
        'js/index.js',
        'js/forecast.js',
        'js/jquery-3.3.1.js',
        '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        '//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];


}

