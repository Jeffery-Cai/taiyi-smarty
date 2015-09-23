<?php /* Smarty version 3.1.27, created on 2015-09-23 13:27:08
         compiled from "G:\wamp\www\taiyi\template\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:307785602a8acc237e1_95634589%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78ddf789bd05eeea8377ca1357300b98641f3797' => 
    array (
      0 => 'G:\\wamp\\www\\taiyi\\template\\index.html',
      1 => 1443014822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307785602a8acc237e1_95634589',
  'variables' => 
  array (
    'navdata' => 0,
    'navalue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5602a8accb2c58_27862302',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5602a8accb2c58_27862302')) {
function content_5602a8accb2c58_27862302 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '307785602a8acc237e1_95634589';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="keywords" content="关键字"/>
	<meta name="description" content="网页描述"/>
	<title>泰一|首页</title>
	<link rel="stylesheet" href="template/static/css/reset.css" />
	<link rel="stylesheet" href="template/static/css/base.css" />
	<link rel="stylesheet" href="template/static/css/flickity.css" />
</head>	
<body>
	<div class="header-container">
		<div id="header">
			<a href="index.php"><img src="template/static/images/index-header-logo.png" style="margin:39px 0 0 31px;"></a>
			<div class="navigator">
				<img src="template/static/images/navigator-left.png">
				<ul>
					<?php
$_from = $_smarty_tpl->tpl_vars['navdata']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['navalue'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['navalue']->_loop = false;
$_smarty_tpl->tpl_vars['navalue']->total= $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['navalue']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['navalue']->value) {
$_smarty_tpl->tpl_vars['navalue']->_loop = true;
$_smarty_tpl->tpl_vars['navalue']->iteration++;
$_smarty_tpl->tpl_vars['navalue']->last = $_smarty_tpl->tpl_vars['navalue']->iteration == $_smarty_tpl->tpl_vars['navalue']->total;
$foreach_navalue_Sav = $_smarty_tpl->tpl_vars['navalue'];
?>
					<li <?php if ($_smarty_tpl->tpl_vars['navalue']->last) {?>style="border:none;"<?php }?>><a href=" <?php echo $_smarty_tpl->tpl_vars['navalue']->value['nav_link'];?>
 "><?php echo $_smarty_tpl->tpl_vars['navalue']->value['nav_name'];?>
</a></li>
					<?php
$_smarty_tpl->tpl_vars['navalue'] = $foreach_navalue_Sav;
}
if (!$_smarty_tpl->tpl_vars['navalue']->_loop) {
?>
					<li>暂无数据</a></li>
					<?php
}
?>
				</ul>
				<img src="template/static/images/navigator-right.png">
				<div class="login">
					<a href="register.php">注册</a>
					<a href="login.php">登陆</a>
				</div>
			</div>
		</div>
	</div>
	<div class="ad">
		<div><a href=""><img src="template/static/images/main-ad.png" alt=""></a></div>
		<div><a href=""><img src="template/static/images/main-ad1.jpg" alt=""></a></div>
		<div><a href=""><img src="template/static/images/main-ad.png" alt=""></a></div>
	</div>
	<div id="container">
		<div id="main">
			<div class="content">
				<div class="top">
					<img src="template/static/images/content-latestWorks.png">
					<img src="template/static/images/main-ad-bottom.png" style="margin:0 0 31px 106px;">
					<a href="">+ more..</a>
				</div>
				<div class="pic">
					<img src="template/static/images/picture1.png" alt="picture-st" style="margin-left:0;">
					<img src="template/static/images/picture2.png" alt="picture-nd">
					<img src="template/static/images/picture3.png" alt="picture-rd">
				</div>
				<div class="bottom">
					<div class="left">
						<h5>关于泰一文化传播</h5>
						<p style="margin-top:24px;"><a href="" style="color:#7eca24;">广州市泰一文化传播有限公司(Target)</a> 是一家集品牌策划/公关活动/3D影视制作/媒体传播为一体的文化传播公司。</p>
						<p>别具创想的策划、新锐的设计以及优质的服务使泰一文化(Target)迅速成为行内的新型文化传播先锋。</p>
						<p>至今，已成为融合科技文化、时尚发布、大型会议等优势资源的综合实力雄厚的公司。</p>
						<img src="template/static/images/read-more.png" style="margin-top:21px;">
					</div>
					<div class="center">
						<h5>服务体系</h5>
						<ul>
							<li style="margin-top:27px;"><a href="">品牌策划、推广，影视包装</a></li>
							<li><a href="">公关活动策划，执行</a></li>
							<li><a href="">广告投放规划</a></li>
							<li><a href="">三维动画影视制作、宣传、发布、创意制作</a></li>
							<img src="template/static/images/read-more.png" style="margin-top:32px;">
						</ul>
					</div>
					<div class="right">
						<h5>公司新闻</h5>
						<ul>
							<li>
								<p><a href="">2008年,广东省科技报指定网络运营商以及合作伙伴</a></p>
								<span>年获批省级项目《岭南建筑文化》三维动画制作以及策划推广2010年，执行广东产学院五周年庆典</span>
							</li>
							<li class="last">
								<p><a href="">2010年,策划珠江文化--南江古百越民间艺术节</a></p>
								<span>联合华工科技大学建筑学院举办《国际建筑文化论坛》</span>
							</li>
							<img src="template/static/images/read-more.png" style="margin-top:7px;">
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-container">
		<div id="footer">
			<div class="top"></div>
			<div class="bottom">
				<img src="template/static/images/footer-logo.png" style="margin-left:24px;">
				<div class="right">
					<ul>
						<?php
$_from = $_smarty_tpl->tpl_vars['navdata']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['navalue'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['navalue']->_loop = false;
$_smarty_tpl->tpl_vars['navalue']->total= $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['navalue']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['navalue']->value) {
$_smarty_tpl->tpl_vars['navalue']->_loop = true;
$_smarty_tpl->tpl_vars['navalue']->iteration++;
$_smarty_tpl->tpl_vars['navalue']->last = $_smarty_tpl->tpl_vars['navalue']->iteration == $_smarty_tpl->tpl_vars['navalue']->total;
$foreach_navalue_Sav = $_smarty_tpl->tpl_vars['navalue'];
?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['navalue']->value['nav_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['navalue']->value['nav_name'];?>
</a></li>
						<?php if (!$_smarty_tpl->tpl_vars['navalue']->last) {?><span>:</span><?php }?>
						<?php
$_smarty_tpl->tpl_vars['navalue'] = $foreach_navalue_Sav;
}
if (!$_smarty_tpl->tpl_vars['navalue']->_loop) {
?>
						<li>暂无数据</a></li>
						<?php
}
?>
					</ul>
					<span class="copyright">Growyex&copy;2011:<a href="">Privacy Policy</a></span>
				</div>
			</div>
		</div> 
	</div>
	<?php echo '<script'; ?>
 src="template/static/js/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="template/static/js/flickity.pkgd.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
	$(".ad").flickity({
		wrapAround:"true",
		pageDots: "true",
		autoPlay: "1500"
	})
	<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>