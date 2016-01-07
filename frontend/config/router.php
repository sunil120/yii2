<?php
$router = [
    '<action:(privacy-policy|vision|about-us)>'=>'site/page',
    'page/<id>'=>'site/page',
    '<action:(contact-us|contact)>'=>'site/contact',
    'signup'=>'site/signup',
    'login'=>'site/login',
];
