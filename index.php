<?php
	include("header.php");
	echo "<aside>";
	$sql = "SELECT sub_category.id as subid,category.name as cname,sub_category.name as sname FROM category,sub_category where category.id=sub_category.cid";
  	$result = mysqli_query($conn, $sql);
  	$category='';
      while($row = mysqli_fetch_assoc($result)) {
		  if($category !=$row['cname']) { 
			  if($category!='') {echo "</ul><br>";}
			  echo "<b>".$row['cname']."</b>&nbsp;<ul>";
			  $category=$row['cname'];
		  }
          echo "<li><a href='index.php?cid=".$row["subid"]."'>".$row['sname']."</a>&nbsp;</li>";
      }		
	echo "</aside><article>";

	$cid = isset($_GET['cid'])? htmlspecialchars($_GET['cid']) : '';
	$key = isset($_GET['key'])? htmlspecialchars($_GET['key']) : '';

	// $sql="select id,name,images,price from product ";

	$find= array("where cid=".$cid,"where name like '%".$key."%'","order by id desc ");
			

	$sql = "SELECT COUNT(*) as total FROM product ";

	if($cid) $fstyle=0;
	elseif ($key) $fstyle=1; 
	else $fstyle=2;

	$sql=$sql.$find[$fstyle];



$perPage = 12;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);

$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$total=$r['total'];
$totalPages = ceil($total / $perPage);

$link = 'index.php?page=%d';
$pagerContainer = '<div style="text-align:right">';   
$pagerContainer .= $total.'件商品'; 
if( $totalPages != 0 ) 
{
  if( $page == 1 ) 
  { 
    $pagerContainer .= ''; 
  } 
  else 
  { 
    $pagerContainer .= sprintf( '<a href="' . $link . '" style="color: #c00"> &#171; 上一页</a>', $page - 1 ); 
  }
  $pagerContainer .= ' <span>第<strong>' . $page . '</strong>页共' . $totalPages . '页</span>'; 
  if( $page == $totalPages ) 
  { 
    $pagerContainer .= ''; 
  }
  else 
  { 
    $pagerContainer .= sprintf( '<a href="' . $link . '" style="color: #c00"> 下一页 &#187; </a>', $page + 1 ); 
  }           
}                   
$pagerContainer .= '</div>';



	$sql = "SELECT id,name,images,price FROM product ";
	$sql=$sql.$find[$fstyle]." limit $startAt,$perPage";

  	$result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    	$img=explode('|',$row["images"]);
?>

	<div class="responsive">
	  <div class="img">
	    <a target="_blank" href="<?='images/'.$img[0]?>">
	      <img src="<?="thumbnail/".$img[0]?>" alt="<?=$row['name']?>"></a>
		  <div class="desc"><?=$row['name']?></div>
		  <span style="color:red"><?="￥".$row['price']?></span>

	  </div>
	</div>	

<?php
	}
	echo "</article></main>";
	echo $pagerContainer;
	
	include("footer.php");
?>