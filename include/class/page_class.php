<?php
  /**
 * bootstrap分页函数（有1,2,3,4,5页数功能）
 * $page_num: 总页数
 * -----------------------------------------------
 * <nav>
 *   <ul class="pagination pull-right">
 *    <?php echo $html=pagetion($page_num); ?>
 *   </ul>
 * </nav>
 * ---------------------------------------------------
 */

function pagetion($page_num)
{
   // 当前页数
  $cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;

  // 上一页
  $next_id=$cur_id-1;

  // 下一页
  $pre_id=$cur_id+1;

  $html="";

// 上一页、点击的时候，返回当前页数-1、当到了最前的页数，不让按钮点击
  if($cur_id==1)
  {
   $html.='<li class="disabled"><a>«</a></li>';
 }else{
   $html.='<li><a href="?page='.$next_id.'">«</a></li>';
 }
  // ...12[3]45...
  // $cur_id-2 <= $i <= $cur_id+2
  // 前...

 if($cur_id>3)
 {
   $html.="...";
 }

 for($i=1;$i<=$page_num;$i++)
 {
   if(($cur_id-2) <= $i && $i <= ($cur_id+2))
   { 
      // 判断是否是当前页，是的话，不让它可以点击
    if($cur_id==$i)
    {
     $html.='<li class="disabled"><a>'.$i.'</a></li>';

   }else{
    $html.='<li><a href="?page='.$i.'">'.$i.'</a></li>';
  }
}
}
if($cur_id<($page_num-2))
{
  $html.="...";
}

// 下一页、点击的时候，返回当前页面+1、当到了最后一页的时候，不让Next按钮可以点击
if($cur_id>$page_num-2)
{
 $html.='<li class="disabled"><a href="#" aria-label="Previous">»</a></li>';
}else{
 $html.='<li><a href="?page='.$pre_id.'">»</a></li>';
}
return $html;
}

?>