<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/default.css">
  <link rel="stylesheet" type="text/css" href="../css/lightform.css">
  <title>添加商品</title>
<style>
td {
width:50%;
}
  output {
    display: flex;
    overflow: auto;
}
.thumbnail {
    height: 100px;
    margin: 10px;
}
</style>
</head>
<body>

    <form action="add.php" method="post" enctype="multipart/form-data">
      <label for="name">商品名称</label>
      <input type="text" id="name" name="name">
  
      <label for="files">商品图片</label>     
      <input id="images" name="images[]" type="file" multiple="multiple" />
<table>
<tr>
  <td>
    
    <label for="category">商品分类</label>
    <select id="category" name="category">
      <option value="0">餐具</option>
      <option value="1">茶具</option>
      <option value="2">花器</option>
    </select>
  </td>
  <td>
    
<label for="tech">工艺</label>
    <select id="tech" name="tech">
      <option value="0">釉下彩</option>
      <option value="1">珐琅彩</option>
      <option value="2">粉彩</option>
    </select>
  </td>
</tr>

<tr>
<td>
    <label for="spec">规格</label>
    <input type="text" id="spec" name="spec">
  
</td>
<td>
    <label for="price">价格</label>
    <input type="number" id="price" name="price">
  
</td>
</tr>
</table>

    <input type="submit" value="提交">
    <output id="result" />
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
</body>
</html>