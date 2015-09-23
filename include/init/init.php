<?php
	header("content-type:text/html;charset=utf-8");
	// error_reporting("0");
	// 网站根目录
define("PATH_URL",__FILE__);
$url=str_replace("\\","/",dirname(PATH_URL));
$mainUrl=str_replace("/include/init","", $url);

// 链接数据库类
require $mainUrl."/include/class/mysql_class.php";

// 基本操作类
require $mainUrl."/include/class/basic_class.php";

// 分页类
require $mainUrl."/include/class/page_class.php";

// 上传类
require $mainUrl."/include/class/upload_class.php";

$db=new Mysql("wd_db");

// 引入smarty	
require $mainUrl."./include/smarty/Smarty.class.php";

// 实例化对象
$smarty=new Smarty;

// 配置模板目录
$smarty->setTemplateDir($mainUrl."/template/");

// var_dump($s);

// 配置缓存文件
$smarty->setCacheDir($mainUrl."/temp/cache/");

// 配置编译文件
$smarty->setCompileDir($mainUrl."/temp/compile/");

?>	