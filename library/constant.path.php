<?php
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT',DOC_ROOT.'/');

define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/');
define('IMAGE_PATH',SITE_PATH.'images/');

define('CSS_PATH',SITE_PATH.'css/');
define('JS_PATH',SITE_PATH.'js/');

define('LIBRARY_ROOT',SITE_ROOT.'library/');
define('VIEW_PATH',SITE_ROOT.'view/');
define('LANGUAGE_ROOT',SITE_ROOT.'language/');
define('CONFIG_ROOT',SITE_ROOT.'config/');

define('MODEL_PATH',SITE_ROOT.'model/');
//echo MODEL_PATH;
define('CONTROLLER_PATH',SITE_ROOT.'controller/');
define('PHASE','Development');

//echo PHASE;

?>
