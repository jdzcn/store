<?php
  include("../conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/default.css">
  <link rel="stylesheet" type="text/css" href="../css/lightform.css">
  <title>添加商品</title>
  
</head>
<body>
  
</body>
</html>

    <form action="add.php" method="post" enctype="multipart/form-data">

    <output id="result" ></output>

      <label for="name">商品名称</label>
      <input type="text" id="name" name="name" required placeholder=请输入商品名称>
  
      <label for="images">商品图片</label>     
      <input id="images" name="images[]" type="file" accept="image/*" multiple />

    <label for="category">商品分类</label>
    <select id="category" name="category">
<?php
  $sql = "SELECT sub_category.id as subid,category.name as cname,sub_category.name as sname FROM category,sub_category where category.id=sub_category.cid";
  $result = mysqli_query($conn, $sql);
   
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          echo "<option value=".$row['subid'].">".$row["cname"]."-".$row['sname']."</option>";
      }
  } else {
      echo "empty.";
  }
?>
    </select>
  
    <label for="tech">工艺</label>
    <select id="tech" name="tech">
<?php
  $sql = "SELECT * FROM tech";
  $result = mysqli_query($conn, $sql);
   
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          echo "<option value=".$row['id'].">".$row["name"]."</option>";
      }
  } else {
      echo "empty.";
  }
?>
    </select>

    <label for="desc">描述</label>
    <select id="desc" name="desc">
    <?php
  $sql = "SELECT * FROM description";
  $result = mysqli_query($conn, $sql);
   
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          echo "<option value=".$row['id'].">".$row["name"]."</option>";
      }
  } else {
      echo "empty.";
  }
?>
    </select>

    <label for="spec">规格</label>
    <input type="text" id="spec" name="spec" placeholder=请输入规格>
  
    <label for="price">价格</label>
    <input type="number" id="price" name="price" value=0 placeholder=请输入价格>

    <input type="submit" value="提交">

  </form>	
	<script type="text/javascript">
		function handleFileSelect() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        output.innerHTML="";
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            // if (!file.type.match('image')) continue;
            
            const maxAllowedSize = 2 * 1024 * 1024;
              if (file.size > maxAllowedSize) {
                alert('文件大小超出限制！');
                event.target.value ='';
                break;
                // Here you can ask your users to load correct file
                // alert("文件大小超出限制！")；
                // exit(0);
              }
            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                var div = document.createElement("div");
                // div.style="display:inline";
                div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
                output.insertBefore(div, null);
            });
            //Read the image
            picReader.readAsDataURL(file);
        }
    } else {
        console.log("Your browser does not support File API");
    }
}

document.getElementById('images').addEventListener('change', handleFileSelect, false);

  </script>

  <?php
    mysqli_close($conn);
  ?>
