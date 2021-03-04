<?php
  define("IMGDIR","../images/");
  include("compress.php");
  include("watermark.php");

	echo "name:".$_POST["name"]."<br>";
	echo "category:".$_POST["category"]."<br>";
	echo "tech:".$_POST["tech"]."<br>";
	// echo "desc:".$_POST["desc"]."<br>";

	echo "spec:".$_POST["spec"]."<br>";
	echo "price:".$_POST["price"]."<br>";
	//print_r($_FILES);
//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['images']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['images']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = IMGDIR.$_FILES['images']['name'][$i];
    
    // $resizeimg = IMGDIR."s".$filename;
    // $markimg=IMGDIR."m".$filename;
    //imagemagick:composite -dissolve 30% -gravity center logo.png 1.jpg 2.jpg
    //convert 1.jpg -resize 100x100 resize_1.jpg

    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      
      exec("convert ".$newFilePath." -resize 1000x1000 ".$newFilePath);
      exec("composite -dissolve 30% -gravity southeast ../images/logo.png ".$newFilePath." ".$newFilePath);
      // exec("rm -f ".$newFilePath);
      // exec("rm -f ".$resizeimg);
      // compress($newFilePath,1000);
      // watermark($newFilePath,"../images/logo.png",5,30);
    }
  }
}
?>
