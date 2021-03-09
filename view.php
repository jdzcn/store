<?php
	include('header.php');

	$pid = isset($_GET['pid'])? htmlspecialchars($_GET['pid']) : '';

	$sql = "SELECT * FROM product where id=";

	if($pid) $sql.=$pid;

	$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$img=explode('|',$r["images"]);

	echo "<main><aside><a href='images/".$img[0]."'><img src='thumbnail/".$img[0]."' width=360 height=360></a></aside><article><div style='margin:20px;'>";
	echo "<h3>".$r['name']."</h3>";
	echo "<p>编号：".$r['id']."</p>";
	echo "<p>规格：".$r['spec']."</p>";
	echo "<p>工艺：".$r['tags']."</p>";
	echo "<p>￥".$r['price']."</p></div></article></main>";

	echo "<div class='row'>";

	$tags=explode(',',$r['tags']);

	foreach ($tags as $tag) {
		$sql="select * from tag where id=".$tag;
		$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		echo "<p>".$r['description']."</p>";
	}
	echo "</div>";


	include('footer.php');
?>