<?php
/*
 1.GENERAL CONFIG
*/

$config=array(
'DB_HOST'=>'127.0.0.1',
'DB_USER'=>'tuto',
'DB_PASS'=>'tuto',
'DB_NAME'=>'tuto',
'SITE_NAME'=>'rami-lab',
'ADMIN_FOLDER'=>'/admin/',
'TEMPLATE_BASE_DIR'=>dirname(__dir__).'/Views' ,
'ADMIN_GROUP'=>4,
''=>'',
''=>''

);
/*
 2.ROUTES CONFIG
*/
$routes=array(
//['GET', '/', 'Controllers\MainController#index', 'home'],
['GET', '/', 'smvc\app\Controllers\BaseController#index', 'home'],

['GET','/member/[i:id]', 'smvc\app\Controllers\MainController#test', 'member'],
['GET','/login/', 'smvc\app\Controllers\LoginController#login', 'login'],
['POST','/login/', 'smvc\app\Controllers\LoginController#logindo', 'logindo'],
['GET','/register/', 'smvc\app\Controllers\RegisterController#register', 'register'],
['POST','/register/', 'smvc\app\Controllers\RegisterController#registerdo', 'registerdo'],
['GET','/logout/', 'smvc\app\Controllers\LoginController#logout', 'logout'],
['GET','/category/[i:catid]/[a:catname]', 'smvc\app\Controllers\MainController#category', 'category'],
['GET', $config['ADMIN_FOLDER'], 'smvc\app\Controllers\AdminController#index', 'adminhome'],
['GET', $config['ADMIN_FOLDER'].'members.[:action]?.[:num]?', 'smvc\app\Controllers\AdminController#members', 'adminmembers']
) ;


 ?>