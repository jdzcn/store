<?php
	include('header.php');

	$pid = isset($_GET['pid'])? htmlspecialchars($_GET['pid']) : '';

	$sql = "SELECT * FROM product where id=";

	if($pid) $sql.=$pid;

	$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$img=explode('|',$r["images"]);
?>
	<main>
		<aside>
			<a href='images/<?=$img[0]?>'><img src='thumbnail/<?=$img[0]?>'></a>
	<div class='bottomright'>

	<ul class="pagination">
	  <li><a href="#">❮</a></li>
	  <li><a href="#">❯</a></li>
	</ul>
	</div>
	</a></aside><article><div style='margin:10px;'>
	<h3><?=$r['name']?></h3>
	<h4>编号：<?=$r['id']?></h4>
	<h4>规格：<?=$r['spec']?></h4>
	<h3 style='color:red'>￥<?=$r['price']?></h3>
	</div>
	</article>
	
	</main>

	<div class='row'>
	<h3>商品简介</h3>

<?php
	$tags=explode(',',$r['tags']);

	foreach ($tags as $tag) {
		$sql="select * from tag where id=".$tag;
		$r = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		echo "<h4>".$r['name']."</h4>";
		echo "<p>".$r['description']."</p>";
	}
	echo "</div>";


	include('footer.php');
?>