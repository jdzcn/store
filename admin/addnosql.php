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
    <option value=1>tableware</option>
    </select>
  
    <label for="tech">工艺</label>
    <select id="tech" name="tech">
    <option value=1>tableware</option>
    </select>

    <label for="desc">描述</label>
    <select id="desc" name="desc">
    <option value=1>tableware</option>
    </select>

    <label for="spec">规格</label>
    <input type="text" id="spec" name="spec" placeholder=请输入规格>
  
    <label for="price">价格</label>
    <input type="number" id="price" name="price" placeholder=请输入价格>

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
            if (!file.type.match('image')) continue;

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

    include("../footer.php");
  ?>
