<?php
require "../include/init/init.php";
if(isset($_POST["addSubmit"]))
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
      var_dump(  $thumbdata['full_path']);
      $data=array(
        "news_name"=>"{$name}",
        "news_content"=>"{$content}",
        "news_time"=>"{$time}",
        "news_description"=>"{$description}",
        "news_small_thumb"=>"{$thumbdata['full_path']}"
        );
      $db->insert("ty_news",$data);
    }
  }else{
     $data=array(
        "news_name"=>"{$name}",
        "news_content"=>"{$content}",
        "news_time"=>"{$time}",
        "news_description"=>"{$description}"
        );
      $db->insert("ty_news",$data);
  }

}

// 页数
$total_record=$db->count_all("ty_news");
// 每页记录数
$per_record=5;
// 总页数（总记录数/每页记录数）
$page_num=ceil($total_record/$per_record);
// 当前页数
$cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;
$offset=($cur_id-1)*$per_record;
//  查询数据

$data=$db->orderby("news_id desc")->limit("{$offset},{$per_record}")->get("ty_news")->result_array();

// 编号
$i=1;

if(isset($_POST["delSubmit"]))
{
  $db->where("news_id")->delMore("del","ty_news","./news.php");
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
      <h4>#添加新闻</h4>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-2 control-label">新闻标题</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入新闻名称" name="name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">新闻描述</label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" placeholder="请输入新闻描述"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">新闻内容</label>
          <div class="col-sm-10">
            <textarea name="content" class="form-control" placeholder="请输入新闻内容"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">缩略图</label>
          <div class="col-sm-10">
            <div class="row">
              <div class="col-md-10">
                <input type="file" name="thumb" class="form-control">
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
          <label class="col-sm-2 control-label">发布时间</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" placeholder="请输入时间" name="time">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="addSubmit">添加</button>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <h4>#新闻列表</h4>
      <form action="" method="post">
        <table class="table table-bordered table-hover placeholders">
          <thead>
            <tr style="font-weight:700">
              <td><input type="checkbox" name="" id="check_all">全选 <button class="btn btn-primary btn-xs" type="submit" name="delSubmit">删除</button></td>
              <td>新闻名称</td>
              <td>新闻描述</td>
              <td>缩略图</td>
              <td>发布时间</td>
              <td>操作</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $value):?>
            <tr>
              <td><input type="checkbox" name="del[]" value="<?php echo $value["news_id"] ?>"> <?php echo $i; ?></td>
              <td><?php echo $value["news_name"] ?></td>
              <td><?php echo $value["news_description"] ?></td>
              <td><img src="<?php echo $value["news_small_thumb"] ?>" alt="" width="100" height="60"></td>
              <td><?php echo date("Y-m-d",$value["news_time"]) ?></td>
              <td><a href="news_edit.php?id=<?php echo $value["news_id"]; ?>"><button class="btn btn-primary btn-xs" type="button">编辑</button></a></td>
            </tr>
            <?php $i++;endforeach; ?>
          </tbody>
        </table>
      </form>
      <news>
       <ul class="pagination pull-right">
        <?php echo $html=pagetion($page_num); ?>
      </ul>
    </news>
  </div>
</div>
</div>
</div>
<?php require "../include/js_all.php" ?>
</body>
</html>