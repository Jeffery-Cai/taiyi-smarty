<?php
require "../include/init/init.php";
if(isset($_POST["addSubmit"]))
{
  $name=trim($_POST["name"])?$_POST["name"]:"";
  $link=trim($_POST["link"])?$_POST["link"]:"";
  $order=trim($_POST["order"])?$_POST["order"]:"";
  $data=array(
    "nav_name"=>"{$name}",
    "nav_link"=>"{$link}",
    "nav_order"=>"{$order}"
    );
  $db->insert("ty_nav",$data);
}
$total_record=$db->count_all("jl_nav");
$per_record=5;
$page_num=ceil($total_record/$per_record);
$cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;
$offset=($cur_id-1)*$per_record;

$data=$db->orderby("nav_order desc")->limit("{$offset},{$per_record}")->get("ty_nav")->result_array();

// 编号
$i=1;

if(isset($_POST["delSubmit"]))
{
  $db->where("nav_id")->delMore("del","ty_nav","./nav.php");
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
  <title>金陵后台管理</title>
  <link href="../template/static/css/bootstrap.min.css" rel="stylesheet">
  <link href="../template/static/css/dashboard.css" rel="stylesheet">
</head>
<body>
  <?php require "../include/admin_header.php" ?>
  <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header"><strong>菜单管理</strong></h3>
    <div class="row">
      <h4>#添加菜单</h4>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">菜单名称</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入菜单名称" name="name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">菜单链接</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入菜单链接" name="link">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="排序" name="order" value="0">
            <p> ** 数值越高，排最前</p>
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
      <h4>#菜单列表</h4>
      <form action="" method="post">
        <table class="table table-bordered table-hover placeholders">
          <thead>
            <tr style="font-weight:700">
              <td><input type="checkbox" name="" id="check_all">全选 <button class="btn btn-primary btn-xs" type="submit" name="delSubmit">删除</button></td>
              <td>菜单名称</td>
              <td>菜单链接</td>
              <td>排序</td>
              <td>操作</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $value):?>
            <tr>
              <td><input type="checkbox" name="del[]" value="<?php echo $value["nav_id"] ?>"> <?php echo $i; ?></td>
              <td><?php echo $value["nav_name"] ?></td>
              <td><?php echo $value["nav_link"] ?></td>
              <td><?php echo $value["nav_order"] ?></td>
              <td><a href="nav_edit.php?id=<?php echo $value["nav_id"]; ?>"><button class="btn btn-primary btn-xs" type="button">编辑</button></a></td>
            </tr>
            <?php $i++;endforeach; ?>
          </tbody>
        </table>
      </form>
      <nav>
       <ul class="pagination pull-right">
        <?php echo $html=pagetion($page_num); ?>
      </ul>
    </nav>
  </div>
</div>
</div>
</div>
<?php require "../include/js_all.php" ?>
</body>
</html>