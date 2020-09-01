<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$pwd = "root"; /* Password */
$dbName = "cart"; /* Database name */

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
$pdo = new PDO($dsn, $user, $pwd);


if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    $sql = "INSERT INTO `images` (`name`) VALUES (?) ";
    $param = array($name);

    $stmt = $pdo->prepare($sql);
    $stmt->execute($param); 

     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>