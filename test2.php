<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$pwd = "root"; /* Password */
$dbName = "cart"; /* Database name */

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
$pdo = new PDO($dsn, $user, $pwd);

$sql = "SELECT `name` FROM `images` where id=?";
$param = array('1');

$stmt = $pdo->prepare($sql);
$stmt->execute($param); 

$result = $stmt->fetch();

$image = $result['name'];
$image_src = "uploads/".$image;

// $sql = "select name from images where id=1";
// $result = mysqli_query($con,$sql);
// $row = mysqli_fetch_array($result);

// $image = $row['name'];
// $image_src = "upload/".$image;

?>

<img src='<?php echo $image_src;  ?>' >