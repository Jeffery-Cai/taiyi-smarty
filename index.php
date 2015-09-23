<?php
	require "./include/init/init.php";

// 导航数据
$navdata=$db->get("ty_nav")->result_array();
$smarty->assign("navdata",$navdata);
	// 显示静态文件
	$smarty->display("index.html");
?>