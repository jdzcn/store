<?php
	include("header.php");
	echo "<aside>";
	$sql = "SELECT sub_category.id as subid,category.name as cname,sub_category.name as sname FROM category,sub_category where category.id=sub_category.cid";
  	$result = mysqli_query($conn, $sql);
  	$category='';
      while($row = mysqli_fetch_assoc($result)) {
		  if($category !=$row['cname']) { 
			  if($category!='') {echo "</ul><br>";}
			  echo "<b>".$row['cname']."</b><ul>";
			  $category=$row['cname'];
		  }
          echo "<li><a href='index.php?cid=".$row["subid"]."'>".$row['sname']."</a>&nbsp;</li>";
      }		
	echo "</aside><article>";

	$q = isset($_GET['cid'])? htmlspecialchars($_GET['cid']) : '';
	$k = isset($_GET['key'])? htmlspecialchars($_GET['key']) : '';
	$sql="select id,name,images,price from product ";
	if($q) $sql=$sql."where cid=".$q;
	elseif ($k) $sql=$sql."where name like '%".$k."%'"; 
	else $sql = $sql."order by id desc limit 12 ";
	
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
	echo "</article>";
	
	include("footer.php");
?>