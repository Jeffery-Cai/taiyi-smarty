<?php
require "../include/init/init.php";

$id=isset($_GET["id"])?(int)$_GET["id"]:1;
// 查询数据
$dataselect=$db->where("news_id={$id}")->get("ty_news")->row_array();
var_dump($dataselect);
if($_POST)
{
 $name=trim($_POST["name"])?$_POST["name"]:"";
 $content=trim($_POST["content"])?$_POST["content"]:"";
 $time=strtotime($_POST["time"]);
 $description=trim($_POST["description"])?$_POST["description"]:"";
 $upload = new Upload('./upload');
 if($_POST["is_file"]==0)
 {
  if( $upload->do_upload('thumb') ){
    $thumbdata=$upload->data();
    $data=array(
      "news_name"=>"{$name}",
      "news_content"=>"{$content}",
      "news_time"=>"{$time}",
      "news_description"=>"{$description}",
      "news_small_thumb"=>"{$thumbdata['full_path']}"
      );
    $db->where("news_id={$id}")->update("ty_news",$data,"./news.php");
  }
}else{
 $data=array(
  "news_name"=>"{$name}",
  "news_content"=>"{$content}",
  "news_time"=>"{$time}",
  "news_description"=>"{$description}"
  );
 $db->where("news_id={$id}")->update("ty_news",$data,"./news.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">
  <title>泰一后台管理</title>
  <link href="../template/static/css/bootstrap.min.css" rel="stylesheet">
  <link href="../template/static/css/dashboard.css" rel="stylesheet">
</head>
<body>
  <?php require "../include/admin_header.php" ?>
  <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!-- 更改即可 -->
    <h3 class="page-header"><strong>新闻管理</strong></h3>
    <div class="row">
      <h4>#编辑新闻</h4>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">新闻标题</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入新闻名称" name="name" value="<?php echo $dataselect["news_name"]; ?>">
          </div>
        </div> 
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">新闻描述</label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" placeholder="请输入新闻描述"><?php echo $dataselect["news_description"]?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">新闻内容</label>
          <div class="col-sm-10">
            <textarea name="content" class="form-control" placeholder="请输入新闻内容"><?php echo $dataselect["news_content"]?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">缩略图</label>
          <div class="col-sm-10">
            <div class="row">
              <div class="col-md-10">
                <input type="file" name="thumb" class="form-control" value="<?php echo $dataselect['news_small_thumb'] ?>">
              </div>
              <div class="col-md-2">
                <select name="is_file" class="form-control">
                  <option value="0">上传</option>
                  <option value="1">不上传</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">发布时间</label>
          <div class="col-sm-10">
            <input type="date" name="time" class="form-control">
            <span>你当前所选时间为：<?php echo date("Y-m-d",$dataselect["news_time"]);?></span>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php require "../include/js_all.php" ?>
</body>
</html>