<?php
$router = [
    //['class' => 'yii\rest\UrlRule', 'controller' => 'api'],
    '<action:(privacy-policy|vision|about-us)>'=>'site/page',
    'page/<id>'=>'site/page',
    '<action:(contact-us|contact)>'=>'site/contact',
    'signup'=>'site/signup',
    'login'=>'site/login',
    /* Yii2 Rest API routing */
    
    'POST api/login'            => 'user/login',
    'GET api/users'             => 'user/index',
    'GET api/users/<id>'        => 'user/view',
    'POST api/users'            => 'user/create',
    'POST api/users/<id>'        => 'user/update',
    'DELETE api/users/<id>'     => 'user/delete',
    'GET api/country'           => 'country/index',
];
