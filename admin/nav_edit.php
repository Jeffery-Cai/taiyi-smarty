<?php
  require "../include/init/init.php";
$id=isset($_GET["id"])?(int)$_GET["id"]:1;
$dataselect=$db->where("nav_id={$id}")->get("ty_nav")->row_array();
  if($_POST)
  {
    $name=trim($_POST["name"])?$_POST["name"]:"";
    $link=trim($_POST["link"])?$_POST["link"]:"";
    $order=trim($_POST["order"])?$_POST["order"]:"";
   $data=array(
      "nav_name"=>"{$name}",
      "nav_link"=>"{$link}",
      "nav_order"=>"{$order}"
    );
    $db->where("nav_id={$id}")->update("ty_nav",$data,"./nav.php");
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
    <!-- 更改即可 -->
    <h3 class="page-header"><strong>菜单管理</strong></h3>
    <div class="row">
      <h4>#编辑菜单</h4>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">菜单名称</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入菜单名称" name="name" value="<?php echo $dataselect["nav_name"]; ?>">
          </div>
        </div>
       <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">菜单链接</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入菜单链接" name="link" value="<?php echo $dataselect["nav_link"]; ?>">
          </div>
        </div>
         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="排序" name="order" value="<?php echo $dataselect["nav_order"]; ?>" >
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