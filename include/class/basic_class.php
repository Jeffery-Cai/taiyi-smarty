<?php
	/**
 * 右边的var_dump
 */
function dump($du)
{
	echo var_dump($du);
}
/**
 * 成功弹出库
 * $content: string类型, 弹出消息框
 * $url: 路径
 */
function success($content,$url)
{
  echo '<script type="text/javascript">alert("'.$content.'");location.href="'.$url.'"</script>';
}
/**
 * 失败弹出库
 */
function error($content)
{
  die('<script type="text/javascript">alert("'.$content.'");history.back();</script>');
}

/**
 * 生成缩略图
 * $img_path: 原图片地址路径
 * $filename: 新的名称
 * $w=100: 缩略图宽度（初始值为100）
 * $h=80: 缩略图宽度（初始值为80）
 * ------------------------------------
 * mk_thumb("./1.jpg","./new","76","115")
 * -------------------------------------;
 * 
 */
function mk_thumb($img_path,$filename,$w=100,$h=80)
{
	$info=getimagesize($img_path);
	$src_img="";
	// 判断是gig?jpg?png
		switch ($info[2]) {
			case 1:
				$src_img=imagecreatefromgif($img_path);
				break;
			case 2:
				$src_img=imagecreatefromjpeg($img_path);
				break;
			case 3:
				$src_img=imagecreatefrompng($img_path);
				break;
		}

	// 新建画板
		$dst_image=imagecreatetruecolor($w,$h);

	// 复制原图到新画板
		imagecopyresized($dst_image,$src_img, 0, 0, 0, 0, $w, $h, $info[0],$info[1]);

		switch ($info[2]) {
			case 1:
				$src_img=imagegif($dst_image,$filename.".gif");
				break;
			case 2:
				$src_img=imagejpeg($dst_image,$filename.".jpg");
				break;
			case 3:
				$src_img=imagepng($dst_image,$filename.".png");
				break;
		}
}

?>