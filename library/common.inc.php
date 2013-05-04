<?php
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT',DOC_ROOT.'/test_scheduler/');
define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/test_scheduler/');
define('IMAGE_PATH',SITE_PATH.'images/');

define('CSS_PATH',SITE_PATH.'css/');
define('JS_PATH',SITE_PATH.'js/');

define('LIBRARY_ROOT',SITE_ROOT.'library/');
define('VIEW_PATH',SITE_ROOT.'view/');
define('MODEL_PATH',SITE_ROOT.'model/');
define('CONTROLLER_PATH',SITE_ROOT.'controller/');

?>
