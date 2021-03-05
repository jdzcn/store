<?php

  namespace syc;
  require("smms.class.php");

  // require("../conn.php");

	echo "name:".$_POST["name"]."<br>";
	echo "category:".$_POST["category"]."<br>";
	echo "tech:".$_POST["tech"]."<br>";
	echo "desc:".$_POST["desc"]."<br>";

	echo "spec:".$_POST["spec"]."<br>";
	echo "price:".$_POST["price"]."<br>";

  $total = count($_FILES['images']['name']);

  for( $i=0 ; $i < $total ; $i++ ) {
      $tmpFilePath = $_FILES['images']['tmp_name'][$i];
      if ($tmpFilePath != ""){
        $newFilePath = "../images/".$_FILES['images']['name'][$i];
    
        //imagemagick:composite -dissolve 30% -gravity center logo.png 1.jpg 2.jpg
        //convert 1.jpg -resize 100x100 resize_1.jpg

        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
          exec("convert ".$newFilePath." -resize 1000x1000 ".$newFilePath);
          exec("composite -dissolve 30% -gravity northeast ../logo2.png ".$newFilePath." ".$newFilePath);

          $sdk = new sdk\smms("ifpobuWYbVskHEpeHueDavbm5GftHmSW");
          $upload = $sdk->Image_Upload($newFilePath);
          print_r($upload);
          $data=json_decode($upload,true);
          $storename=$data["data"]["storename"];
          $newfilename= "../images/".$storename;
          rename($newFilePath,$newfilename);
          $imgstr=$imgstr."|".$storename;

        }
      }
  }

  $sql="insert into product (name,cid,images,tid,did,spec,price,createdate) values ('".$_POST["name"]."',";
  $sql.=$_POST["category"].",'".$imgstr."',".$_POST["tech"].",".$_POST["desc"].",'".$_POST["spec"]."',";
  $sql.=$_POST["price"].",'".date("Y-m-d")."')";
  echo $sql;  
  // if (mysqli_query($conn, $sql)) {
      
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }

  // mysqli_close($conn);
?>
