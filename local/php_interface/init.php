<?php

if(file_exists($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/function.php"))
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/function.php");


if(file_exists($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/event_handlers.php"))
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/event_handlers.php");


//деактивация новости
if(file_exists($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/deactivation.php"))
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/deactivation.php");

//удаление товара
if(file_exists($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/delete_product.php"))
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/delete_product.php");

//добавление в контент...
if(file_exists($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/user.php"))
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/include/user.php");


 ?>
