<?php
	include('header.php');

	$pid = isset($_GET['pid'])? htmlspecialchars($_GET['pid']) : '';

	$sql = "SELECT * FROM product where id=";

	if($pid) $sql.=$pid;

	$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$img=explode('|',$r["images"]);

	echo "<main><aside><a href='images/".$img[0]."'><img src='thumbnail/".$img[0]."' width=360 height=360></a></aside><article><div style='margin:10px;'>";
	echo "<h2>".$r['name']."</h2>";
	echo "<h4>编号：".$r['id']."</h4>";
	echo "<h4>规格：".$r['spec']."</h4>";
	echo "<h3 style='color:red'>￥".$r['price']."</h3></div></article></main>";

	echo "<div class='row'>";
	echo "<h2>商品简介</h2>";
	$tags=explode(',',$r['tags']);

	foreach ($tags as $tag) {
		$sql="select * from tag where id=".$tag;
		$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		echo "<h3>".$r['name']."</h3>";
		echo "<p>".$r['description']."</p>";
	}
	echo "</div>";


	include('footer.php');
?>